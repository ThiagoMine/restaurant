<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ConfigRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductListRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\PurchaseRepository;
use DateTime;
use Illuminate\Http\Request;

class AdminSalesControl extends Controller
{
    private $purchaseRepository;
    private $orderRepository;
    private $productListRepository;
    private $productRepository;
    private $configRepository;

    function __construct()
    {
        $this->purchaseRepository = new PurchaseRepository();
        $this->orderRepository = new OrderRepository();
        $this->productListRepository = new ProductListRepository();
        $this->productRepository = new ProductRepository();
        $this->configRepository = new ConfigRepository();
    }

    public function salesIndexControl() 
    {
        $sales = $this->purchaseRepository->getOpenCommands();

        return view('system/sales-control/sales-control', compact("sales"));
    }

    public function openCommandForm() 
    {
        return view('system/sales-control/open-command');
    }

    public function openCommand(Request $request) 
    {
        if ($this->purchaseRepository->verifyIfCommandIsActive($request->command)) {
            // TODO tratativa de erro por comanda já aberta
            dd('Erro comanda já aberta.');
        }

        $data = [
            "contact_name" => $request->name,
            "command_number" => $request->command,
            "has_delivery" => ($request->opcao == "opcao3"),
            "for_trip" => ($request->opcao == "opcao2"),
            "status" => 1,
            "start" => new DateTime(),
            "delivery_address" => $request->delivery_address ?? null,
            "end" => null
        ];

        $this->purchaseRepository->insert($data);

        return redirect('admin/sales-control');
    }

    public function viewCommand(Request $request)
    {
        $sale = $this->purchaseRepository->getPurchaseByCommandId($request->command);
        $orders = $this->orderRepository->getOrdersForPurchase($sale->id);
        $ordersArray = [];
        $productsArray = [];
        $totalValue = 0;
        $deliveryTax = 0;

        if ($orders) {
            foreach ($orders as $order) {
                $orderTotalValue = 0;
                $products = $this->productListRepository->getProductsFromOrder($order->id);

                if ($products) {
                    foreach ($products as $product) {
                        $productDetail = $this->productRepository->getById($product->product_id);

                        if ($product->related_product_id === null) {
                            $productsArray[$product->product_id] = array(
                                "name" => $product->name,
                                "value" => $product->value
                            );
                        } else {
                            $productsArray[$product->related_product_id]['additionals'][] = array(
                                "name" => $product->name,
                                "value" => $product->value
                            );
                        }

                        $orderTotalValue = $orderTotalValue + $product->value;
                    }
                }

                
                
                $ordersArray[] = array(
                    "id" => $order->id,
                    "done" => $order->done,
                    "in_kitchen" => $order->in_kitchen,
                    "created_at" => $order->created_at,
                    "products" => $productsArray,
                    "order_total" => (float) $orderTotalValue
                );

                $productsArray = [];

                $totalValue = $totalValue + $orderTotalValue;
            }
        }

        if ($sale->has_delivery) {
            $deliveryTax = (float) $this->configRepository->findConfigByName("Taxa de Entrega");
        }

        $saleArray = array(
            "id" => $sale->id,
            "contact_name" => $sale->contact_name,
            "delivery_address" => $sale->delivery_address,
            "command_number" => $sale->command_number,
            "start" => $sale->start,
            "orders" => $ordersArray,
            "delivery_tax" => $deliveryTax,
            "sale_total_value" => ($totalValue + $deliveryTax)
        );

        return view('system/sales-control/view-command', $saleArray);
    }

    public function closeCommand(Request $request) 
    {
        $saleArray = array(
            "id" => $request->id,
            "paymentForm" => $request->payment_form
        );

        $this->orderRepository->finishAllOrdersFromCommand($request->id);
        $this->purchaseRepository->closeCommand($saleArray);


        return redirect('admin/sales-control');
    }
}

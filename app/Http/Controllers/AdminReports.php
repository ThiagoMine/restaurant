<?php

namespace App\Http\Controllers;

use App\Enums\PurchaseStatus;
use App\Http\Repositories\ConfigRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductListRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\PurchaseRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminReports extends Controller
{
    private $purchaseRepository;
    private $orderRepository;
    private $productListRepository;
    private $productRepository;

    public function __construct()
    {   
        $this->purchaseRepository = new PurchaseRepository();
        $this->orderRepository = new OrderRepository();
        $this->productListRepository = new ProductListRepository();
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        return view('system/reports/reports');
    }

    public function filter(Request $request)
    {
        $configRepository = new ConfigRepository();
        $deliveryTax = (float) $configRepository->findConfigByName("Taxa de Entrega");
        
        $reportFilter = array(
            'start' => $request->start,
            'end' => $request->end,
            'delivery' => $request->delivery
        );

        if ($request->type == "purchase") {
            $data = $this->salesReport($reportFilter);

            $reportTotal = 0;
            foreach ($data as $key => $item) {
                if ($item['hasDelivery']) {
                    $reportTotal = $reportTotal + $item['total'] + $deliveryTax;
                    $data[$key]['total'] = $data[$key]['total'] + $deliveryTax;
                } else {
                    $reportTotal = $reportTotal + $item['total'];
                }
            }
            
            return view('system/reports/filter-sales', ['data' => $data, 'reportTotal' => $reportTotal]);
        } else {
            $data = $this->productReport($reportFilter);
            
            return view('system/reports/filter-product', ['data' => $data]);
        }
    }

    private function salesReport($reportFilter)
    {
        $orders = $this->orderRepository->getReport($reportFilter);
        $saleArray = array();
        $salesArray = array();
        $ordersArray = array();
        $saleTotal = null;
        
        foreach ($orders as $order) {
            $productsArray =  null;
            $orderTotalValue = 0;

            $type = "Consumo no Local";

            if ($order->has_delivery) {
                $type = "Entrega";
            } elseif ($order->for_trip) {
                $type = "Retirada";
            }

            $products = $this->productListRepository->getProductsFromOrder($order->order_id);

            if ($products) {
                foreach ($products as $product) {
                    $productDetail = $this->productRepository->getById($product->product_id);

                    if ($product->related_product_id === null) {
                        $productsArray[$product->product_id] = array(
                            "name" => $productDetail->name,
                            "value" => $product->value
                        );
                    } else {
                        $productsArray[$product->related_product_id]['additionals'][] = array(
                            "name" => $productDetail->name,
                            "value" => $product->value
                        );
                    }

                    $orderTotalValue = $orderTotalValue + $product->value;
                }
            }

            $ordersArray[$order->purchase_id][] = [
                'products' => $productsArray,
                'orderTotal' => $orderTotalValue,
                'orderId' => $order->order_id
            ];

            if (isset($saleTotal[$order->purchase_id])) {
                $saleTotal[$order->purchase_id] = $saleTotal[$order->purchase_id] + $orderTotalValue;
            } else {
                $saleTotal[$order->purchase_id] = $orderTotalValue;
            }
            
            $salesArray[$order->purchase_id] = [
                'purchaseId' => $order->purchase_id,
                'client' => $order->contact_name,
                'hasDelivery' => $order->has_delivery,
                'status' => PurchaseStatus::getDescription($order->status),
                'command' => $order->command_number,
                'type' => $type,
                'payment' => $order->payment,
                'orders' => $ordersArray[$order->purchase_id],
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                'total' => $saleTotal[$order->purchase_id]
            ];
        }

        return $salesArray;
    }

    private function productReport($reportFilter)
    {
        $orders = $this->orderRepository->getReport($reportFilter);
        $count = null;
        $productsArray = [];
        
        foreach ($orders as $order) {

            $products = $this->productListRepository->getProductsFromOrder($order->order_id);

            if ($products) {
                foreach ($products as $product) {
                    $productDetail = $this->productRepository->getById($product->product_id);

                    if ($product->related_product_id === null) {
                        if (isset($count[$product->product_id])) {
                            $count[$product->product_id] = $count[$product->product_id] + 1;
                        } else {
                            $count[$product->product_id] = 1;
                        }
                        
                        $productsArray[$product->product_id] = array(
                            "name" => $productDetail->name,
                            "value" => $product->value,
                            "count" => $count[$product->product_id]
                        );
                    }
                }
            }
        }

        return $productsArray;
    }
}

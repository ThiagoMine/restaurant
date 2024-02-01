<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductListRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\PurchaseRepository;
use Exception;
use Illuminate\Http\Request;

class OrderControl extends Controller
{
    private $categoriesRepository;
    private $purchaseRepository;
    private $orderRepository;
    private $productRepository;
    private $productListRepository;

    function __construct()
    {  
        $this->categoriesRepository = new CategoryRepository();
        $this->purchaseRepository = new PurchaseRepository();
        $this->orderRepository = new OrderRepository();
        $this->productRepository = new ProductRepository();
        $this->productListRepository = new ProductListRepository();
    }

    public function createForm(Request $request)
    {
        $categories = $this->categoriesRepository->getAll();

        $categoryArray = null;
        $categoriesArray = null;

        foreach ($categories as $category) {
            $categoryArray['id'] = $category->id;
            $categoryArray['name'] = $category->name;
            $categoryArray['seo_name'] = $category->seo_name;
            $categoryArray['products'] = $this->categoriesRepository->getProductsFromCategory($category->id);
            $categoryArray['additionals'] = $this->categoriesRepository->getAdditionalsFromCategory($category->id);
            $categoriesArray[] = $categoryArray;
        }
        $data['categories'] = $categoriesArray;
        $data['command'] = $request->command;

        return view('system/order/create-order', $data);
    }

    public function createOrder(Request $request)
    {
        $items = $request->items;
        $command = $request->command;
        $purchase = $this->purchaseRepository->getPurchaseByCommandId($command);
        
        $data = array(
            "done" => false,
            "in_kitchen" => true,
            "purchase_id" => $purchase->id,
            "unique_id" => $request->unique
        );

        try {
            $order = $this->orderRepository->insert($data);

            if ($order) {
                foreach ($items as $item) {
                    $product = $this->productRepository->getById($item['product-id']);

                    if ($product->id === 1 ) {
                        $data = array(
                            "product_id" => $product->id,
                            "order_id" => $order->id,
                            "value" => $item['product-price'],
                            "name" => $item['product-name'],
                            "comment" => $item['comment'],
                            "related_product_id" => null
                        );    
                    } else {
                        $data = array(
                            "product_id" => $product->id,
                            "order_id" => $order->id,
                            "value" => $product->price,
                            "comment" => $item['comment'],
                            "name" => $product->name,
                            "related_product_id" => null
                        );
    
                    }
                    
                    $this->productListRepository->insert($data);

                    if (isset($item["additional-id"])){
                        foreach ($item["additional-id"] as $additionalId) {
                            $additional = $this->productRepository->getById($additionalId);
                            $data = array(
                                "product_id" => $additional->id,
                                "order_id" => $order->id,
                                "value" => $additional->price,
                                "comment" => null,
                                "related_product_id" => $product->id
                            );
        
                            $this->productListRepository->insert($data);
                        }
                    }
                }
            }
        } catch(Exception $e) {
            dd("erro", $e);
        }

        return redirect("admin/sales-control/command/{$command}");
    }

    public function getKitchenOrders() 
    {
        $orders = $this->orderRepository->getKitchenOrders();
        $ordersArray = [];
        $productsArray = [];

        foreach ($orders as $order) {
            $purchase = $this->purchaseRepository->getById($order->purchase_id);

            $products = $this->productListRepository->getProductsFromOrder($order->id);
            $productsArray = [];

            if ($products) {
                foreach ($products as $product) {
                    $productDetail = $this->productRepository->getById($product->product_id);

                    if ($product->related_product_id === null) {
                        $productsArray[$product->product_id]['name'] = $productDetail->name;
                        $productsArray[$product->product_id]['comments'] = $product->comment;
                    } else {
                        $productsArray[$product->related_product_id]['additionals'][] = $productDetail->name;
                    }
                }
            }

            $orderArray = array(
                "id" => $order->id,
                "date" => $order->created_at,
                "has_delivery" => $purchase->has_delivery,
                "for_trip" => $purchase->for_trip,
                "command" => $purchase->command_number,
                "name" => $purchase->contact_name,
                "itens" => $productsArray
            );

            $ordersArray[] = $orderArray;
        }

        $data['orders'] = $ordersArray;

        return view('system/kitchen/kitchen-control', $data);
    }

    public function finalizeKitchen(Request $request) {
        $orderId = $request->orderId;
        try {
            $this->orderRepository->finalizeKitchen($orderId);
        } catch(Exception) {
            // TODO tratamento de erro
        }

        return redirect("/admin/order/kitchen");
    }
}

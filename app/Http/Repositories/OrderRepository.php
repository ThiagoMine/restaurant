<?php

namespace App\Http\Repositories;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    private $model;

    function __construct () 
    {
        $this->model = new Order();
    }

    public function getAll() 
    {
        return $this->model::all();
    }

    public function insert($data) 
    {
        DB::beginTransaction();
        try {
            $order = $this->model::create($data);
            DB::commit();
            return $order;
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }    
    }

    public function getById($id) 
    {
        return $this->model::where('id', $id)->first();
    }

    public function delete($id) 
    {
        return $this->model::find($id)->delete();
    }

    public function getOrdersForPurchase($command)
    {
        return $this->model::where('purchase_id', '=', $command)
                ->get();
    }

    public function getKitchenOrders()
    {
        return $this->model::where('in_kitchen', '=', true)
                ->get();
    }

    public function finalizeKitchen($orderId)
    {
        $order = $this->model::find($orderId);
        $order->in_kitchen = false;
        $order->save();
    }

    public function finishAllOrdersFromCommand($purchaseId)
    {
        $orders = $this->getOrdersForPurchase($purchaseId);

        foreach ($orders as $order) {
            $order->in_kitchen = false;
            $order->save();
        }
    }

    public function getReport($reportFilter) {
        $search = $this->model::select(
                'purchases.id as purchase_id', 
                'purchases.contact_name', 
                'purchases.status', 
                'purchases.command_number', 
                'purchases.payment',
                'purchases.has_delivery',
                'purchases.created_at',
                'orders.id as order_id'
            )
            ->join('purchases', 'orders.purchase_id', '=', 'purchases.id')
            ->where('purchases.start', '>=', $reportFilter['start'])
            ->where('purchases.end', '<=', $reportFilter['end']);
        
        switch ($reportFilter['delivery']) {
            case "delivery":
                $search->where('has_delivery', '=', true);
                break;
            case "trip":
                $search->where('for_trip', '=', true);
                break;
        }

        return $search->get();
    }
}
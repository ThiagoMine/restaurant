<?php

namespace App\Http\Repositories;

use App\Models\ProductList;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductListRepository
{
    private $model;

    function __construct () 
    {
        $this->model = new ProductList();
    }

    public function getAll() 
    {
        return $this->model::all();
    }

    public function insert($data) 
    {
        DB::beginTransaction();
        try {
            $item = $this->model::create($data);
            DB::commit();
            return $item;
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

    public function getProductsFromOrder($orderId) 
    {
        return $this->model::where('order_id', $orderId)->get();
    }
}
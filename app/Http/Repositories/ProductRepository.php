<?php

namespace App\Http\Repositories;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    private $model;

    function __construct () {
        $this->model = new Product();
    }

    public function getAll() {
        return $this->model::all();
    }

    public function insert($data) {
        DB::beginTransaction();
        try {
            $this->model::create($data);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }    
    }

    public function getById($id) {
        return $this->model::where('id', $id)->first();
    }

    public function delete($id) {
        return $this->model::find($id)->delete();
    }

    public function update($id, $newData) {
        $product = $this->getById($id);

        $product->name = $newData['name'];
        $product->seo_name = $newData['seo_name'];
        $product->is_active = $newData['is_active'];
        $product->description = $newData['description'];
        $product->category_id = $newData['category_id'];
        $product->price = $newData['price'];
        $product->image = $newData['image'];

        try {
            $product->save();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function getProducts() {
        return $this->model::where("type", 1)->get();
    }

    public function getAdditionals() {
        return $this->model::where("type", 2)->get();
    }
}
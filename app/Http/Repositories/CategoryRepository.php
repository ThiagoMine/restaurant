<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryRepository
{

    const CATEGORY_PIZZA = 4;
    const CATEGORY_ACAI = 1;
    const CATEGORY_PORCOES = 2;
    const CATEGORY_PIZZA_DOCE = 3;
    const CATEGORY_COMBOS = 5;
    const CATEGORY_LANCHES = 6;
    const CATEGORY_PASTEIS = 7;

    private $model;

    function __construct () 
    {
        $this->model = new Category();
    }

    public function getAll() 
    {
        return $this->model::all();
    }

    public function insert($data) 
    {
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

    public function getById($id) 
    {
        return $this->model::where('id', $id)->first();
    }

    public function delete($id) 
    {
        return $this->model::find($id)->delete();
    }

    public function update($id, $newData) 
    {
        $category = $this->getById($id);

        $category->name = $newData['name'];
        $category->seo_name = $newData['seo_name'];
        $category->is_active = $newData['is_active'];

        try {
            $category->save();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function getProductsFromCategory($categoryId)
    {
        $productsModel = new Product();

        $products = $productsModel::where('category_id', $categoryId)
                        ->where('type', 1)->get();

        $productArray = null;
        $productsArray = null;

        foreach ($products as $product) {
            $productArray['name'] = $product->name;
            $productArray['seo_name'] = $product->seo_name;
            $productArray['id'] = $product->id;
            $productArray['description'] = $product->description;
            if ($product->image) {
                $productArray['image'] = Storage::url($product->image);
            } else {
                $fileName = $this->defaultImage($product->category_id);
                $productArray['image'] = asset("images/default_categories/{$fileName}");
            }           
            $productArray['price'] = $product->price;

            $productsArray[] = $productArray;
        }
        return $productsArray;
    }

    public function getAdditionalsFromCategory($categoryId)
    {
        $productsModel = new Product();

        $products = $productsModel::where('category_id', $categoryId)
                        ->where('type', 2)->get();

        $productArray = null;
        $productsArray = null;

        foreach ($products as $product) {
            $productArray['name'] = $product->name;
            $productArray['seo_name'] = $product->seo_name;
            $productArray['id'] = $product->id;
            $productArray['description'] = $product->description;
            // $productArray['image'] = Storage::url($product->image);;
            $productArray['price'] = $product->price;

            $productsArray[] = $productArray;
        }
        
        return $productsArray;
    }

    private function defaultImage($categoryId)
    {
        switch ($categoryId) {
            case 4:
                return "pizza.jpg";
                break;
            case 1:
                return "acai.jpeg";
                break;
            case 2:
                return "porcoes.jpg";
                break;
            case 3:
                return "pizza_doce.jpg";
                break;
            case 5:
                return "combos.jpg";
                break;
            case 6:
                return "lanches.jpg";
                break;
            case 7:
                return "pasteis.jpeg";
                break;
        }
    }
}
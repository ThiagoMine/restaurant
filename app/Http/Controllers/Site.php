<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\CategoryRepository;

class Site extends Controller
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function menu(Request $request)
    {

        $categories = $this->categoryRepository->getAll();

        $categoryArray = null;
        $categoriesArray = null;

        foreach ($categories as $category) {
            $categoryArray['id'] = $category->id;
            $categoryArray['name'] = $category->name;
            $categoryArray['products'] = $this->categoryRepository->getProductsFromCategory($category->id);
            $categoriesArray[] = $categoryArray;
        }
        $data['categories'] = $categoriesArray;

        // dd($data);
        return view('site/menu', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

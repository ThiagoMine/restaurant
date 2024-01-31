<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;

class AdminIndex extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesRepository = new CategoryRepository();
        $totalCategories = count($categoriesRepository->getAll());

        $productsRepository = new ProductRepository();
        $totalProducts = count($productsRepository->getProducts());
        $totalAdditionals = count($productsRepository->getAdditionals());


        return view('system/index', compact("totalCategories", "totalProducts", "totalAdditionals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

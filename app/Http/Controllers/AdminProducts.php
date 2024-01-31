<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class AdminProducts extends Controller
{
    private $categoryRepository;
    private $productRepository;
    private $appHelper;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->productRepository = new ProductRepository();
        $this->appHelper = new AppHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getAll();
        
        return view('system/products/list-products', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $isEdit = false;

        return view('system/products/create-products',compact("isEdit", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $this->handleImage($request);
        $seoName = strtolower($this->appHelper->normalizeChars($request->name));
        
        $data = [
            'name' => $request->name,
            'seo_name' => $seoName,
            'is_active' => $request->is_active === "on" ? true : false,
            'description' => $request->description,
            'type' => 1,
            'category_id' => $request->category,
            'price' => $request->price,
            'image' => $imagePath
        ];

        $result = $this->productRepository->insert($data);
        return redirect('/admin/register/products');    

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

        $categories = $this->categoryRepository->getAll();
        $product = $this->productRepository->getById($id);
        $isEdit = true;

        return view('system/products/create-products',compact("isEdit", "categories", "product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  
        $imagePath = $this->handleImage($request, $id);

        $newData['name'] = $request->name;
        $newData['seo_name'] = strtolower($this->appHelper->normalizeChars($request->name));
        $newData['is_active'] = $request->is_active === "on" ? true : false;
        $newData['description'] = $request->description;
        $newData['category_id'] = $request->category_id;
        $newData['price'] = $request->price;
        $newData['image'] = $imagePath;

        $this->productRepository->update($id, $newData);

        return redirect('/admin/register/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productRepository->delete($id);
        return redirect('/admin/register/products');
    }

    private function handleImage($request, $id = false) {
        $imagePath = null;

        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('uploads', 'public');
            } catch (Exception $e) {
                dd($e);
            }
        } else {
            if ($id) {
                $product = $this->productRepository->getById($id);
                $imagePath = $product->image;
            } else {
                $imagePath = null;
            }
        }

        return $imagePath;
    }
}

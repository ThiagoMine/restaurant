<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class AdminAdditionals extends Controller
{
    private $productRepository;
    private $appHelper;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->appHelper = new AppHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getAll();

        return view('system/additionals/list-additionals', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isEdit = false;

        return view('system/additionals/create-additionals',compact("isEdit"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('uploads', 'public');
            } catch (Exception $e) {
                dd($e);
            }
        } else {
            $imagePath = null;
        }

        $seoName = strtolower($this->appHelper->normalizeChars($request->name));
        $data = [
            'name' => $request->name,
            'seo_name' => $seoName,
            'is_active' => $request->is_active === "on" ? true : false,
            'description' => $request->description,
            'type' => 2,
            'category_id' => null,
            'price' => $request->price,
            'image' => $imagePath
        ];


        $result = $this->productRepository->insert($data);
        return redirect('/admin/register/additionals');
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
        $product = $this->productRepository->getById($id);
        $isEdit = true;

        return view('system/additionals/create-additionals',compact("isEdit", "product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('uploads', 'public');
            } catch (Exception $e) {
                dd($e);
            }
        } else {
            $imagePath = $product->image;
        }

        $seoName = strtolower($this->appHelper->normalizeChars($request->name));

        $newData['name'] = $request->name;
        $newData['seo_name'] = $seoName;
        $newData['is_active'] = $request->is_active === "on" ? true : false;
        $newData['description'] = $request->description;
        $newData['category_id'] = null;
        $newData['price'] = $request->price;
        $newData['image'] = $imagePath;

        $result = $this->productRepository->update($id, $newData);

        return redirect('/admin/register/additionals');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productRepository->delete($id);
        return redirect('/admin/register/additionals');
    }
}

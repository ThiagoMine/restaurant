<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Repositories\CategoryRepository;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategories extends Controller
{
    private $categoryRepository;
    private $appHelper;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->appHelper = new AppHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        return view('system/categories/list-categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system/categories/create-categories',['isEdit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seoName = strtolower($this->appHelper->normalizeChars($request->name));

        $data = [
            'name' => $request->name,
            'seo_name' => $seoName,
            'is_active' => $request->is_active === "on" ? true : false,
            'father_category_id' => null
        ];
        
        $result = $this->categoryRepository->insert($data);
        return redirect('/admin/register/categories');
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
        $category = $this->categoryRepository->getById($id);

        $isEdit = true;

        return view('system/categories/create-categories', compact('isEdit', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seoName = strtolower($this->appHelper->normalizeChars($request->name));

        $newData['name'] = $request->name;
        $newData['seo_name'] = $seoName;
        $newData['is_active'] = $request->is_active === "on" ? true : false;

        $result = $this->categoryRepository->update($id, $newData);

        return redirect('/admin/register/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryRepository->delete($id);
        return redirect('/admin/register/categories');
    }
}

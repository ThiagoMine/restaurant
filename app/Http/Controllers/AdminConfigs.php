<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ConfigRepository;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminConfigs extends Controller
{
    private $configsRepository;

    public function __construct()
    {
        $this->configsRepository = new ConfigRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configs = $this->configsRepository->getAll();

        return view('system/configs/list-configs', ['configs' => $configs]);
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
        $config = $this->configsRepository->getById($id);

        $isEdit = true;

        return view('system/configs/create-configs', compact('isEdit', 'config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newData['name'] = $request->name;
        $newData['value'] = $request->value;
        $newData['active'] = $request->active === "on" ? true : false;

        $this->configsRepository->update($id, $newData);

        return redirect('/admin/register/configs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("oi");
    }
}

<?php

namespace App\Http\Repositories;

use App\Models\Config;
use Exception;
use Illuminate\Support\Facades\DB;

class ConfigRepository
{
    private $model;

    function __construct () 
    {
        $this->model = new Config();
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
        $config = $this->getById($id);

        $config->name = $newData['name'];
        $config->value = $newData['value'];
        $config->active = $newData['active'];

        try {
            $config->save();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function findConfigByName($name)
    {
        $config = $this->model::where('name', $name)->first();
        return $config->value;
    }
}
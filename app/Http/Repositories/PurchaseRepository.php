<?php

namespace App\Http\Repositories;

use App\Models\Purchase;
use Exception;
use Illuminate\Support\Facades\DB;

class PurchaseRepository
{
    private $model;

    function __construct () 
    {
        $this->model = new Purchase();
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

    public function verifyIfCommandIsActive($command_number) 
    {
        $result = $this->model::where('command_number', '=', $command_number)
                        ->where('status', '=', 1)
                        ->get();
        
        return count($result) > 0;
    }

    public function getOpenCommands()
    {
        return $this->model::where('status', '=', 1)
                ->get();
    }

    public function getPurchaseByCommandId($command_number) 
    {
        $result = $this->model::where('command_number', '=', $command_number)
                        ->where('status', '=', 1)
                        ->firstOrFail();
        
        return $result;
    }

    public function closeCommand($saleArray)
    {
        $purchase = $this->getById($saleArray['id']);

        if (!$purchase) {
            return false;
        }
        $purchase->status = 2;
        $purchase->end = new \DateTime();
        $purchase->payment = $saleArray['paymentForm'];

        

        try {
            $purchase->save();
            return true;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
    }

    public function getReport($reportFilter)
    {
        $search = $this->model::where('start', '>=', $reportFilter['start'])
            ->where('end', '<=', $reportFilter['end']);
        
        switch ($reportFilter['delivery']) {
            case "delivery":
                $search->where('has_delivery', '=', true);
                break;
            case "trip":
                $search->where('for_trip', '=', true);
                break;
        }

        // dd($search->toSql(), $search->get());

        return $search->get();
    }
}
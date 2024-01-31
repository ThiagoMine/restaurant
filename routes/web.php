<?php

use App\Http\Controllers\AdminAdditionals;
use App\Http\Controllers\AdminCategories;
use App\Http\Controllers\AdminConfigs;
use App\Http\Controllers\AdminIndex;
use App\Http\Controllers\AdminProducts;
use App\Http\Controllers\AdminReports;
use App\Http\Controllers\AdminSalesControl;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderControl;
use App\Http\Controllers\Site;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/", [Site::class, 'index']);
Route::get("/cardapio", [Site::class, 'menu']);

Route::middleware(['auth'])->group(function () {
    //Sales control (Purchase) routes
    Route::get("/admin/sales-control", [AdminSalesControl::class, 'salesIndexControl']);
    Route::get("/admin/sales-control/open-command", [AdminSalesControl::class, 'openCommandForm']);
    Route::post("/admin/sales-control/open-command", [AdminSalesControl::class, 'openCommand']);   
    Route::post("/admin/sales-control/close-command", [AdminSalesControl::class, 'closeCommand']);   
    Route::get("/admin/sales-control/command/{command}", [AdminSalesControl::class, 'viewCommand']);
    

    //Order control routes
    Route::get("/admin/order/create-order/{command}", [OrderControl::class, 'createForm']);
    Route::post("/admin/order/create-order/{command}", [OrderControl::class, 'createOrder']);
    Route::get("/admin/order/kitchen", [OrderControl::class, 'getKitchenOrders']);
    Route::post("/admin/order/finalize-kitchen", [OrderControl::class, 'finalizeKitchen']);

    //Register routes
    Route::resource("/admin/register/products", AdminProducts::class);
    Route::resource("/admin/register/additionals", AdminAdditionals::class);
    Route::resource("/admin/register/categories", AdminCategories::class); 
    Route::resource("/admin/register/configs", AdminConfigs::class); 

    // Report Routes
    Route::get("/admin/reports", [AdminReports::class, 'index']); 
    Route::post("/admin/reports/report/filter", [AdminReports::class, 'filter']); 


    Route::apiResource("/admin", AdminIndex::class);
});
// Auth::routes();

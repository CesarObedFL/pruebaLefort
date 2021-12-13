<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// customers rutes
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customer/{id}', [CustomerController::class, 'read'])->name('customer.read');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

// sales rutes
Route::get('/sale', [SaleController::class, 'index'])->name('sale.index');
Route::post('/sale', [SaleController::class, 'create'])->name('sale.create');
Route::get('/sale/{id}', [SaleController::class, 'read'])->name('sale.read');
// solditems rutes
Route::get('/solditem', [SoldItemController::class, 'index'])->name('solditem.index');
Route::get('sale/{id}/solditems', [SoldItemController::class, 'showBySale'])->name('soldItems.showBySale');
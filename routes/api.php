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
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// sales rutes
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');

// solditems rutes
Route::get('/solditems', [SoldItemController::class, 'index'])->name('solditems.index');
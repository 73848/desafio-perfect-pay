<?php

use App\Http\Controllers\ClientController;
use App\Models\Product;
use App\Http\Controllers\PassingData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sales;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    DASHBOARD
*/
Route::get('/', [ProductController::class, 'showDashboard']);

/*
CLIENTES: GET/POST/UPDATE/EDIT/DELETE
*/
Route::post('/register', [ClientController::class, 'create']);

/*
PRODUTOS:  GET/POST/UPDATE/EDIT/DELETE
*/
Route::get('/products', function () {
return view('crud_products');});
Route::get('/edit-product/{product}', [ProductController::class, 'showProduct']);
Route::put('/edit-product/{product}', [ProductController::class, 'edit']);
Route::post('/products',[ProductController::class, 'create']);
/*
VENDAS: GET/POST/UPDATE/EDIT/DELETE
*/
Route::get('/sales', [ProductController::class, 'showSales']);
Route::post('/sales',[Sales::class, 'create']);
Route::get('/search',[Sales::class, 'search']);




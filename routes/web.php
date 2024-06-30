<?php

use App\Models\Product;
use App\Http\Controllers\PassingData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Telas para ver o funcionamento sem dados
*/
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/sales', [PassingData::class, 'index']);
Route::get('/products', function () {
    return view('crud_products');
});

/*
Adicionar / editar produto
*/

Route::post('/products',[ProductController::class, 'create']);



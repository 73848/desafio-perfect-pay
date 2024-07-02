<?php

use App\Http\Controllers\ClientController;
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
Passando os dados para o dashboard
*/
Route::get('/', [PassingData::class, 'passingProductsDashboard']);
Route::get('/sales', [PassingData::class, 'passingProductsSales']);

Route::get('/products', function () {
    return view('crud_products');
});



/*
Adicionar / logar cliente
*/
Route::post('/register', [ClientController::class, 'create']);




/*
Adicionar / editar produto
*/

Route::post('/products',[ProductController::class, 'create']);



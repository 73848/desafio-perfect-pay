<?php

use App\Http\Controllers\ClientController;
use App\Models\Product;
use App\Http\Controllers\PassingData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sales;
use App\Http\Controllers\UsersController;

/*
    DASHBOARD
*/
Route::get('/', [ProductController::class, 'showDashboard']);

/*
USUARIOS: GET/POST/UPDATE/DELETE    
*/
Route::get('/cadastro', [UsersController::class, 'index']);
Route::post('/registerUser', [UsersController::class, 'create']);


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
Route::delete('/edit-product/{product}', [ProductController::class, 'delete']);
Route::post('/products',[ProductController::class, 'create']);


/*
VENDAS: GET/POST/UPDATE/EDIT/DELETE
*/
Route::get('/sales', [ProductController::class, 'showSales']);
Route::get('/edit-sale/{sale}', [Sales::class, 'dataToEditSales']);
Route::put('/edit-sale/{sale}', [Sales::class, 'editSale']);
Route::post('/sales',[Sales::class, 'create']);
Route::get('/search', [Sales::class, 'search']);
Route::get('/searchWithDate', [Sales::class, 'searchWithDate']);




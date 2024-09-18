<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sales;
use App\Http\Controllers\UsersController;

/*
    DASHBOARD
*/

/*
USUARIOS: GET/POST/UPDATE/DELETE    
*/
Route::controller(UsersController::class)->group(function (){
    Route::get('/cadastro',  'index');
    Route::get('/login',  'indexLogin');
    Route::post('/registerUser',  'create');
    Route::post('/loginUsers',  'login');
});

/*
CLIENTES: GET/POST/UPDATE/EDIT/DELETE
*/
Route::post('/register', [ClientController::class, 'create']);

/*
PRODUTOS:  GET/POST/UPDATE/EDIT/DELETE
*/



Route::get('/products', function () {
return view('crud_products');});

Route::controller(ProductController::class)->group(function (){
    Route::get('/', 'showDashboard');
    Route::get('/edit-product/{product}', 'showProduct');
    Route::put('/edit-product/{product}', 'edit');
    Route::delete('/edit-product/{product}',  'delete');
    Route::post('/products','create');
    Route::get('/sales',  'showSales');
});



/*
VENDAS: GET/POST/UPDATE/EDIT/DELETE
*/
Route::controller(Sales::class)->group(function (){
    Route::get('/edit-sale/{sale}', 'dataToEditSales');
    Route::put('/edit-sale/{sale}', 'editSale');
    Route::post('/sales', 'create');
    Route::get('/search',  'search');
    Route::get('/searchWithDate', 'searchWithDate');
});




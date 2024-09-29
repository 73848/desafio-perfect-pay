<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sales;
use App\Http\Controllers\UsersController;

/*
USUARIOS: GET/POST/UPDATE/DELETE    
*/
Route::controller(UsersController::class)->group(function (){
    Route::middleware('isAdmin')->group(function (){
        Route::get('/cadastro',  'index');
        Route::post('/registerUser',  'create');
    });
    Route::get('/login',  'indexLogin');
    Route::post('/loginUsers',  'login');
    Route::get('/deslogar',  'logOut');
});

/*
CLIENTES: GET/POST/UPDATE/EDIT/DELETE
*/
Route::post('/register', [ClientController::class, 'create']);

/*
PRODUTOS:  GET/POST/UPDATE/EDIT/DELETE
*/

Route::get('/products', function () {
return view('crud_products');})->name('product.create')->middleware(['logged','isAdmin']);

Route::controller(ProductController::class)->group(function (){
    Route::middleware('logged')->group(function (){
        Route::middleware('isAdmin')->group(function (){
            Route::get('/edit-product/{product}', 'showProduct')->name('product.show');
            Route::put('/edit-product/{product}', 'edit')->name('product.edit');
            Route::delete('/edit-product/{product}',  'delete');
            Route::post('/products','create');
        });
        Route::get('/', 'showDashboard');
        Route::get('/sales',  'showSales');

    });
});
/*
VENDAS: GET/POST/UPDATE/EDIT/DELETE
*/
Route::controller(Sales::class)->group(function (){
    Route::middleware('logged')->group(function (){
        Route::middleware('isAdmin')->group(function (){
            Route::get('/edit-sale/{sale}', 'dataToEditSales')->name('sales.show');
            Route::put('/edit-sale/{sale}', 'editSale')->name('sales.edit');
        });
    Route::post('/sales', 'create')->name('create.sale');
    Route::get('/search',  'search');
    Route::get('/searchWithDate', 'searchWithDate');
    });
});




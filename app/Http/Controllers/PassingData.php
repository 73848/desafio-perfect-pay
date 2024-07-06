<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassingData extends Controller
{
      // passando produtos para minha view de crud_sales
      public function passingProductsSales(){
        $products = DB::table('products')->get();
        $clients = DB::table('client')->get();
       
        return view('crud_sales', ['products'=> $products,'clients' => $clients]);
}
      // passando produtos para minha view de crud_sales
    public function passingProductsDashboard(){
      $products = DB::table('products')->get();
      $clients = DB::table('client')->get();

      $sales = DB::table('client_products')
      ->join('client', 'client_products.client_id', '=', 'client.id')
      ->join('products', 'client_products.product_id','=', 'products.id' )
      ->select('client_products.*', 'client.name', 'products.name', 'products.price')
      ->get();
      return view('dashboard', ['products'=> $products,'clients' => $clients, 'sales' => $sales  ]);
}

    public function search(Request $request){
      $inputForm = $request->validate(
        [
          'name'=> 'required'
        ]
        );
        $inputForm[ 'name']= strip_tags( $inputForm[ 'name'])  ;

        $sales = DB::table('client_products')
        ->join('client', 'client_products.client_id', '=', 'client.id')
        ->join('products', 'client_products.product_id','=', 'products.id' )
        ->select('client_products.*', 'client.name', 'products.name', 'products.price')
        ->where('client.id', '=',  $inputForm[ 'name'])
        ->get();  
        return view('dashboard', ['sales' => $sales ]);
      }
}

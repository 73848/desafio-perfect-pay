<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PassingData extends Controller
{
      // passando produtos para minha view
      public function passingProductsSales(){
        $products = DB::table('products')->get();
        $clients = DB::table('client')->get();
        return view('crud_sales', ['products'=> $products,'clients' => $clients ]);
    }
    
    public function passingProductsDashboard(){
      $products = DB::table('products')->get();
      $clients = DB::table('client')->get();
      return view('dashboard', ['products'=> $products,'clients' => $clients ]);
  }
}

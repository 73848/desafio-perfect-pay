<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PassingData extends Controller
{
      // passando produtos para minha view
      public function index(){
        $products = DB::table('products')->get();
        return view('crud_sales', ['products'=> $products]);
    }
}

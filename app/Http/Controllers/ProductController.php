<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   
  
    // cadastro de produto
    public function create(Request $request){
        $inputForm = $request->validate(
           [ 
            'name' =>   'required',
            'description' =>   'required',
            'price' =>   'required',
           ]
        );

        $inputForm[ 'name']= strip_tags( $inputForm[ 'name'])  ;
        $inputForm[ 'description']= strip_tags( $inputForm[ 'description'])  ;
        $inputForm[ 'price']= strip_tags( $inputForm[ 'price'])  ;

        Product::create($inputForm);
        return redirect('/products');
      }
}

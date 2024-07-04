<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Sales extends Controller
{
    
    public function create(Request $request){
        $inputForm = $request->validate(
            [ 
             'client_id' =>   'required',
             'product_id' =>   'required',
             'date' =>   'required',
             'quantity' =>   'required',
             'discount' =>   'required',
             'status' =>   'required',
            ]
         );
         $inputForm[ 'client_id']= strip_tags( $inputForm[ 'client_id']);
         $inputForm[ 'product_id']= strip_tags( $inputForm[ 'product_id']);
         $inputForm[ 'date']= strip_tags( $inputForm[ 'date']);
         $inputForm[ 'quantity']= strip_tags( $inputForm[ 'quantity']);
         $inputForm[ 'discount']= strip_tags( $inputForm[ 'discount']);
         $inputForm[ 'status']= strip_tags( $inputForm[ 'status']);

        $sale = Sales::create($request->all());
        $sale
        return redirect('/sales');
    }     
}

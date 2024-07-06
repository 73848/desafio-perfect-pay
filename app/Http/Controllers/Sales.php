<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
         $date= strip_tags( $inputForm[ 'date']);
         $quantity = strip_tags( $inputForm[ 'quantity']);
         $discount = strip_tags( $inputForm[ 'discount']);
         $status =strip_tags( $inputForm[ 'status']);
         
         // manipulando o formato da data antes de inserir no db para mais dúvidas, verifique a doc do PHP sobre 
         //a classe DateTime
         $format = 'd/m/Y';
         $dateFormat = \DateTime::createFromFormat($format, $date )->format('Y-m-d');

         $client = Client::find($inputForm['client_id']);
         $client->products()->attach($inputForm[ 'client_id'],
          [
         'quantity' => $quantity, 
         'date' => $dateFormat, 
         'discount' => $discount,
         'status' => $status]);
        return redirect('/sales');
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

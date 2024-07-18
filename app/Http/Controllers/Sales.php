<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function dataToEditSales($id){
        $products = DB::table('products')->get();
        $sales = DB::table('client_products')
        ->where('client_products.client_id', '=',  $id)
        ->join('client', 'client_products.client_id', '=', 'client.id')
        ->join('products', 'client_products.product_id','=', 'products.id' )
        ->select('client_products.*', 'client.name as client_name','products.name as products_name', 'products.price')
        ->get();
      return view('edit_sales', ['sales'=> $sales, 'products'=> $products]);
     }
     public function editSale(Request $request, $id){
        $inputForm = $request->validate(
            [ 
             'product_id' =>   'required',
             'date' =>   'required',
             'quantity' =>   'required',
             'discount' =>   'required',
             'status' =>   'required',
            ]
        );
        $inputForm['product_id'] = strip_tags('product_id');
        $date= strip_tags( $inputForm[ 'date']);
        $quantity = strip_tags( $inputForm[ 'quantity']);
        $discount = strip_tags( $inputForm[ 'discount']);
        $status =strip_tags( $inputForm[ 'status']);

        $format = 'd/m/Y';
        $dateFormat = \DateTime::createFromFormat($format, $date )->format('Y-m-d');

        $client = Client::find($id);

        $client->products()->updateExistingPivot($id, [
            'product_id' => $id,
            'date' => $dateFormat,
            'quantity' => $quantity,
            'discount' => $discount,
            'status' => $status
        ]);
        
        return redirect('/');

     }
    public function search(Request $request){
        $inputForm = $request->validate([
            'id' => 'required'
        ]);
        
        $sales = DB::table('client_products')
            ->where('client_products.client_id', '=',  $inputForm['id'])
            ->join('client', 'client_products.client_id', '=', 'client.id')
            ->join('products', 'client_products.product_id','=', 'products.id' )
            ->select('client_products.*', 'client.name as client_name','products.name as products_name', 'products.price')
            ->get();
            redirect('/sales');
    }
}

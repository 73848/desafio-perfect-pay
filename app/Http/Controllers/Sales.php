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
    public function dataToEditSales(Sales $sales){
        
      return view('edit_sales', ['sales'=> $sales]);
     }
    public function search(Request $request){
        
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   
  
    // cadastro de produto
    public function create(Request $request){
        $input = $request->validate(
           [ 
            'name' =>   'required|max:20',
            'description' =>   'required|max:55',
            'price' =>   'required',
           ]
        );

        $input[ 'name']= strip_tags( $input[ 'name'])  ;
        $input[ 'description']= strip_tags( $input[ 'description'])  ;
        $input[ 'price']= strip_tags( $input[ 'price'])  ;

        Product::create($input);
        return redirect('/products');
      }
      public function showSales(){
        $products = DB::table('products')->get();
        $clients = DB::table('client')->get();
       
        return view('crud_sales', ['products'=> $products,'clients' => $clients]);
}     
      public function showDashboard(){
        $products = DB::table('products')->get();
        $clients = DB::table('client')->get();

        $sales = DB::table('client_products')
        ->join('client', 'client_products.client_id', '=', 'client.id')
        ->join('products', 'client_products.product_id','=', 'products.id' )
        ->select('client_products.*', 'client.name', 'products.name', 'products.price')
        ->get();
        return view('dashboard', ['products'=> $products,'clients' => $clients, 'sales' => $sales  ]);
      }

     public function showProduct(Product $product){
      return view('edit_product', ['product'=> $product]);
     }

      public function edit(Product $product, Request $request){
        $input = $request->validate(
          [ 
           'name' =>   'required|max:20',
           'description' =>   'required|max:55',
           'price' =>   'required',
          ]
       );

       $product['name'] = $input['name'];
       $product['description'] = $input['description'];
       $product['description'] = $input['description'];

       $product->update($input);
       return redirect('/');
      }

    
}

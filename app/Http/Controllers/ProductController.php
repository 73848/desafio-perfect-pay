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
        $products = DB::table('products')->paginate(10);
        $clients = DB::table('client')->paginate(10);
        return view('crud_sales', ['products'=> $products,'clients' => $clients]);
}     
      public function showDashboard(){
        $products = DB::table('products')->orderBy('name')->get();
        $clients = DB::table('client')->orderBy('name')->get();
        $sales = DB::table('client_products')
        ->join('client', 'client_products.client_id', '=', 'client.id')
        ->join('products', 'client_products.product_id','=', 'products.id' )
        ->select('client_products.*', 'client.name as client_name','products.name as products_name', 'products.price')
        ->paginate(10);
        return view('dashboard', ['products'=> $products, 'sales' => $sales, 'clients' => $clients ]);
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
       $product['price'] = $input['price'];

       $product->update($input);
       return redirect('/');
      }
      
      public function delete(Product $product){
        $product->delete();
        return redirect('/');
      }
}

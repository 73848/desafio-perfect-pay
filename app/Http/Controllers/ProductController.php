<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   
    // correcao de bug que faz com que usuario submita formularios multiplas vezes
    // cadastro de produto
    public function create(Request $request){
        $input = $request->validate(
           [ 
            'name' =>   'required|max:20',
            'description' =>   'required|max:55',
            'price' =>   'required',// é necessario correcao aqui para impedir que usuarios digitem valors com ',' separando as casas decimasi
           ]
        );

        $input[ 'name']= strip_tags( $input[ 'name'])  ;
        $input[ 'description']= strip_tags( $input[ 'description'])  ;
        $input[ 'price']= strip_tags( $input[ 'price'])  ;

        Product::create($input);
        return redirect('/products')->with(['message' => 'roduto cadastrado com sucesso!']);
      }

      public function showSales(){
        $products = get_products_data();
        $clients = DB::table('client')->paginate(10);
        return view('crud_sales', ['products'=> $products,'clients' => $clients]);
}     

      public function showDashboard(){
        $products = get_products_data();
        $clients = DB::table('client')->orderBy('name')->get();
        $sales = get_sales_data()->forPage(1,10);
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
       return redirect('/')->with(['message' => 'Produto atualizado com sucesso!']);
      }
      
      public function delete(Product $product){
        $product->delete();
        return redirect('/');
      }
}

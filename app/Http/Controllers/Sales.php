<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sales extends Controller
{

    public function create(Request $request)
    {
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

        $inputForm['client_id'] = strip_tags($inputForm['client_id']);
        $inputForm['product_id'] = strip_tags($inputForm['product_id']);
        $date = strip_tags($inputForm['date']);
        $quantity = strip_tags($inputForm['quantity']);
        $discount = strip_tags($inputForm['discount']);
        $status = strip_tags($inputForm['status']);

        // manipulando o formato da data antes de inserir no db para mais dúvidas, verifique a doc do PHP sobre 
        //a classe DateTime
        $dateFormat = aplicacao_banco_de_dados_($date);

        $client = Client::find($inputForm['client_id']);
        $client->products()->attach(
            $inputForm['client_id'],
            [
                'quantity' => $quantity,
                'date' => $dateFormat,
                'discount' => $discount,
                'status' => $status
            ]
        );
        return redirect('/sales')->with('sucess','Edicao feita com sucesso!');
    }
    public function dataToEditSales($id)
    {
        $products = DB::table('products')->paginate(10);

        $sale = get_sales_data($id);
        return view('edit_sales', ['sale' => $sale, 'products' => $products]);
    }
    public function editSale(Request $request, $id)
    {
        $inputForm = $request->validate(
            [
                'client_id' => 'required',
                'product_id' =>   'required|',
                'date' =>   'required',
                'quantity' =>   'required',
                'discount' =>   'required',
                'status' =>   'required',
            ]
        );

        $product_id = strip_tags($inputForm['product_id']);
        $client_id = strip_tags($inputForm['client_id']);
        $date = strip_tags($inputForm['date']);
        $quantity = strip_tags($inputForm['quantity']);
        $discount = strip_tags($inputForm['discount']);
        $status = strip_tags($inputForm['status']);

        $dateFormat = aplicacao_banco_de_dados_($date);

        $product = Product::find($product_id);
        $discount = validandoDesconto($discount, $product->price);
        DB::table('client_products')->where('id', $id)->update(['product_id' => $product_id,
            'date' => $dateFormat,
            'quantity' => $quantity,
            'discount' => $discount,
            'status' => $status]);


        return redirect('/')->with(['message','Edicao feita com sucesso!']);
    }
    public function search(Request $request)
    {
        $inputForm = $request->validate(['search' => 'required']);
        $search = $inputForm['search'];
        $products = get_products_data();
        $sales = get_especific_sales_by_client_product($search);

        return view('dashboard', ['sales' => $sales, 'products' => $products])->with(['message','Resultados encontrados']);
    }
    public function searchWithDate(Request $request)
    {
        $inputForm = $request->validate(['initialDate' => 'required', 'finalDate' => 'required']);
        $initialDate = $inputForm['initialDate'];
        $finalDate = $inputForm['finalDate'];

        $initialDate = aplicacao_banco_de_dados_($initialDate);
        $finalDate = aplicacao_banco_de_dados_($finalDate);

        $products = get_products_data();
        $sales = get_sales_betwen_dates($initialDate, $finalDate);
        
        return view('dashboard', ['sales' => $sales, 'products' => $products]);
    }
}

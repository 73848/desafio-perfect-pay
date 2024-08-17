<?php
use Illuminate\Support\Facades\DB;

 function aplicacao_banco_de_dados_($date_from_app){
    $format = 'd/m/Y';
    $dateFormat = \DateTime::createFromFormat($format, $date_from_app )->format('Y-m-d');
    return $dateFormat;
};

function banco_de_dados_aplicacao($date_from_db){
    $format = 'Y-m-d';
    $date_formated = \DateTime::createFromFormat($format, $date_from_db )->format('d/m/Y');
    return $date_formated;

}

function get_sales_data(){
    $sales = DB::table('client_products')
    ->join('client', 'client_products.client_id', '=', 'client.id')
    ->join('products', 'client_products.product_id','=', 'products.id' )
    ->select('client_products.*', 'client.name as client_name','products.name as products_name', 'products.price')
    ->paginate(10);

    return $sales;
}

function get_products_data(){
    $products = DB::table('products')->orderBy('name')->paginate(10);
    return $products;
}
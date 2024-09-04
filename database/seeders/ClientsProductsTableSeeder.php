<?php

namespace Database\Seeders;

use App\Http\Controllers\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ClientsProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Product::all( ) as $product){
            $client = Client::inRandomOrder()->take(rand(1,15))->pluck('id')->toArray();
            $discount =  validandoDesconto($product['price'], fake()->numerify('##'));
            $quantity = fake()->numerify('#');
            $sales_price = $quantity * ($product['price']-$discount);
            $product->clients()->attach($client, [
                'quantity' => $quantity, 
                'date' => fake()->date('Y_m_d') ,
                'discount' => $discount, 
                'price_sales' => $sales_price, 
                'status' => fake()->randomElement(['Aprovado', 'Cancelado', 'Devolvido'])]);
        };
    }

}

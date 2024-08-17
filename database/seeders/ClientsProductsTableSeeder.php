<?php

namespace Database\Seeders;

use App\Http\Controllers\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Product;

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
            $product->clients()->attach($client, [
                'quantity' => fake()->numerify('##'), 
                'date' => fake()->date('Y_m_d') ,
                'discount' => fake()->numerify('##'), 
                'status' => fake()->randomElement(['Aprovado', 'Cancelado', 'Devolvido'])]);
        };
    }
}

class ClientsProductsTableTestFeature extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $sales = [];
    $sales[0] =
   [   
   'product_id' => 2,
   'client_id'=> 8,
   'quantity' => 1, 
   'date' => 21/04/2021,
   'discount' => 15, 
   'status' => 'Aprovado'];
   $sales[1] =
   [   
   'product_id' => 20,
   'client_id'=> 5,
   'quantity' => 1, 
   'date' => 20/04/2022,
   'discount' => 150, 
   'status' => 'Cancelado'];
    
   $sales[2] =
   [   
   'product_id' => 1,
   'client_id'=> 12,
   'quantity' => 5, 
   'date' => 14/03/2012,
   'discount' => 20, 
   'status' => 'Devolvido'];
        
    }
}

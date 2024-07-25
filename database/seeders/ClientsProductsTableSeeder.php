<?php

namespace Database\Seeders;

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
            $client = Client::inRandomOrder()->take(rand(1,10))->pluck('id')->toArray();
            $product->clients()->attach($client, [
                'quantity' => fake()->numerify('##'), 
                'date' => fake()->date('Y_m_d') ,
                'discount' => fake()->numerify('##'), 
                'status' => fake()->randomElement(['Aprovado', 'Cancelado', 'Devolvido'])]);
        };
    }
}
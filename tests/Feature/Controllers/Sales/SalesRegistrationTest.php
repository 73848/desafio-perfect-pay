<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

# php artisan test --filter=SalesUpdate
class SalesUpdate extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_sales_are_created_correctly(){
        $product = Product::create( [
            'name'=>'Iphone 7',
            'description'=>'O melhor móvel da atualizade',
            'price' => '800',   
        ]);
        $client = Client::create([
            'name'=>'Jhonny Dogs',
            'email'=>'jhonyDogs@gmail.com',
            'cpf'=>'000000000-00',
        ]);

        $product->clients()->attach(  $client ,  
        ['quantity' => 4,
        'date' => '2024-08-30',
        'discount' => 20,
        'status' => 'Aprovado'] );

        $this->assertDatabaseHas('client_products', ['product_id' => $product->id, 'client_id'=> $client->id]);


    }




}

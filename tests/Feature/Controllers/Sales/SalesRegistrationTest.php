<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
# php artisan test --filter=SalesCreated
class SalesCreated extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_sales_are_created_correctly(){
        $productData = [
            'name'=>'Iphone 7',
            'description'=>'O melhor móvel da atualizade',
            'price' => '800',   
        ];
        $clientData = [
            'name'=>'Jhonny Dogs',
            'email'=>'jhonyDogs@gmail.com',
            'cpf'=>'000000000-00',
        ];

        $product = Product::create($productData);
        $client = Client::create($clientData);
        $salesData = ['quantity' => 4,
        'date' => '2024-08-30',
        'discount' => 20,
        'status' => 'Aprovado'] ;
        $client->products()->attach($product->id ,  $salesData);

        $this->assertDatabaseHas('client_products', ['product_id' => $product->id, 'client_id'=> $client->id]);
        
    }




}

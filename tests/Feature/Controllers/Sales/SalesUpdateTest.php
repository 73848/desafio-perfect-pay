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
    public function test_sales_are_updated_correctly(){
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
        $updateDataProduct = [
            'name'=>'Iphone 15 Pro Max',
            'description'=>'Compre o Iphone 14 com nome diferente',
            'price' => '8000', 
        ];
        $salesData =  ['quantity' => 4,
        'date' => '2024-08-30',
        'discount' => 20,
        'status' => 'Aprovado'];
        
        $salesDataupdate =  ['quantity' => 1,
        'date' => '2024-08-31',
        'discount' => 40,
        'status' => 'Aprovado'];

        $client = Client::create($clientData);
        Product::create($productData);
        $Updateproduct = Product::create($updateDataProduct);

        # Criação da venda
        $client->products()->attach($client, $salesData);

        #Edicao da venda
        $client->products()->update($salesDataupdate);
        
        $this->assertDatabaseHas('client_products', ['product_id' => $Updateproduct->id, 
        'client_id'=> $client->id]);

    }
}

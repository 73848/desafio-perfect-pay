<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

# php artisan test --filter=Valida_desconto
class Valida_desconto extends TestCase
{
    use RefreshDatabase;


    public function test_is_validating_descont(){
        $productData = [
            'name' => 'Iphone 7',
            'description' => 'O melhor móvel da atualizade',
            'price' => 800,
        ];
        $clientData = [
            'name' => 'Jhonny Dogs',
            'email' => 'jhonyDogs@gmail.com',
            'cpf' => '000000000-00',
        ];

        $product = Product::create($productData);
        $client = Client::create($clientData);
        $salesDataOne = [
            'quantity' => 4,
            'date' => '2024-08-30',
            'discount' => 1000,
            'status' => 'Aprovado'
        ];
        $salesDataTwo = [
            'quantity' => 4,
            'date' => '2024-08-30',
            'discount' => 400,
            'status' => 'Aprovado'
        ];

        $this->assertEquals(80, validandoDesconto($productData['price'],$salesDataOne['discount']));
        $this->assertEquals(400, validandoDesconto($productData['price'],$salesDataTwo['discount']));
        
        $this->assertIsFloat(validandoDesconto($productData['price'],$salesDataOne['discount']));

        
    }

   
    




}

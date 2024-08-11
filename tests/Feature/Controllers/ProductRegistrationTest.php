<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

# php artisan test --filter=ProductRegistration
class ProductRegistration extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_product_are_set_correctly(){
        $clientData = [
            'name'=>'Iphone 7',
            'description'=>'O melhor móvel da atualizade',
            'price' => '800',
        ];
        
        $product = Product::factory()->create($clientData);
        
        $response = $this->post('/register',$clientData );

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name'=>'Iphone 7']);
        $this->assertDatabaseHas('products',['description'=>'O melhor móvel da atualizade']);
        $this->assertDatabaseHas('products', ['price' => '800']);



    }




}

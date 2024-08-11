<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

# php artisan test --filter=ProductUpdate
class ProductUpdate extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_product_are_update_correctly(){
        $productData = [
            'name'=>'Iphone 7',
            'description'=>'O melhor móvel da atualizade',
            'price' => '800',
        ];
        $productUpdate = [
            'name'=>'Iphone 15',
            'description'=>'Esse sim é o melhor.',
            'price' => '10000',
        ];

        $product = Product::factory()->create($productData);
        $product->update($productUpdate);
        
        $response = $this->post('/register',$productData );
        $response->assertStatus(302);

        $this->assertDatabaseHas('products', ['name'=>'Iphone 15']);
        $this->assertDatabaseHas('products',['description'=>'Esse sim é o melhor.']);
        $this->assertDatabaseHas('products', ['price' => '10000']);
    

    }




}

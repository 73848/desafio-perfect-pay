<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ProductControllerTest
class ProductControllerTest extends TestCase
{
    public function test_client_are_set_correctly(){
        $product = new Product([
            'id'=> '1',
            'client_id'=> '2',
            'product_id'=>'2',
            'description'=>'Good product to have fun',
            'quantity'=>'10',
            'name'=> 'Soprador',
            'date' => '03-08-2024',
            'status'=>'Aprovado',
            'price'=> '100'
        ]);

        $this->assertEquals('1',$product->id);
        $this->assertEquals('2', $product->client_id);
        $this->assertEquals('2', $product->product_id);
        $this->assertEquals('Good product to have fun', $product->description);
        $this->assertEquals('Soprador', $product->name);
        $this->assertEquals('03-08-2024', $product->date);
        $this->assertEquals('Aprovado', $product->status);
        $this->assertEquals('100', $product->price);
    }



}

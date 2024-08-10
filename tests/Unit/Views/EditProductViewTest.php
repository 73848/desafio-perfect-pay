<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ProductControllerTest
class EditProductViewTest extends TestCase
{
    use RefreshDatabase;
    public function test_edit_products_view(){
        $product = Product::factory(30)->create();
        $product = $product->first();

        $response = $this->get("/edit-product/{$product->id}");
        $response->assertStatus(200);
        $response->assertViewHas('product', $product);
        $response->assertViewIs('edit_product');

    }



}

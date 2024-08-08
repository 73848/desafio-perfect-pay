<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ProductControllerTest
class ProductViewTest extends TestCase
{
    public function test_crud_products_view(){
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewIs('crud_products');

    }



}

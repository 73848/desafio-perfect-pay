<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=DashboardViewTest
class DashboardViewTest extends TestCase
{
    use RefreshDatabase;
    public function test_dashboard_view_product(){
        $products = Product::factory(30)->create();
        $product = $products->first();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('dashboard');

        $this->assertIsObject($product);

    }



}

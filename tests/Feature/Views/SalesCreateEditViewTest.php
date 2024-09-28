<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

# php artisan test --filter=ProductControllerTest
class SalesViewTest extends TestCase
{


    // teste para ver se os produtos estao sendo enviados para a view edit_sales
    public function test_crud_sales_are_showed_corretly(){
        $response = $this->get('/sales');
        $response->assertViewIs('crud_sales');
        $response->assertStatus(200);
    }

    // teste para
    // teste para
    // teste para
    // teste para



}

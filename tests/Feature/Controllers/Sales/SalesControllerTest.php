<?php

namespace Tests\Feature;

use App\Http\Controllers\Sales;
use App\Models\Client;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
# php artisan test --filter=SalesController
class SalesController extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_sales_are_created_only_for_logged_users_correctly()
    {
        Event::fake();

        $product = Product::factory(1)->create()->first();
        $client = Client::factory(1)->create()->first();
        
        $admin = Users::factory(1)->create()->first();
        $this->actingAs($admin)->withSession(['role_id'=>'1', 'user_id'=> '7']);
                

        $request = Request::create('/sales','POST', [                
        'client_id' =>   $client->id,
        'product_id' =>   $product->id,
        'date' =>   '29/09/2024',
        'quantity' =>   '3',
        'discount' =>   '20',
        'status' =>   'Aprovado',]);
        $sale = new Sales();
        $response = $sale->create($request);

        $this->get('/sales')->assertViewIs('crud_sales');
        $this->assertEquals(302, $response->getStatusCode()); // quando criado, ha o redirecionamento da venda

        }
}

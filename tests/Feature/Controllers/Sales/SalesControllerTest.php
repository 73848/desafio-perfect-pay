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
    public function test_sales_are_created_correctly()
    {
        Event::fake();
        $client = Client::factory(1)->create()->first();
        $product = Product::factory(1)->create()->first();
        $admin = Users::factory(1)->create()->first();
        $this->actingAs($admin)->withSession(['user_id' => '1', 'role_id' => '1']);
        //metodo ja testado
        $request = Request::create('/sales', 'POST', [
            'client_id' =>   $client->id,
            'product_id' =>   $product->id,
            'date' =>   '29/09/2024',
            'quantity' =>   '3',
            'discount' =>   '20',
            'status' =>   'Aprovado',
        ]);
        $sale = new Sales();
        $sale->create($request); // o id dessa venda sera 1
        $response = $sale->create($request);
        $this->assertEquals(302, $response->getStatusCode());  // quando criado, ha o redirecionamento da venda

    }
    public function test_sales_are_edit_correctly()
    {
        Event::fake();
        $client = Client::factory(1)->create()->first();
        $product = Product::factory(1)->create()->first();
        $admin = Users::factory(1)->create()->first();
        $this->actingAs($admin)->withSession(['user_id' => '1', 'role_id' => '1']);
        //metodo ja testado
        $request = Request::create('/sales', 'POST', [
            'client_id' =>   $client->id,
            'product_id' =>   $product->id,
            'date' =>   '29/09/2024',
            'quantity' =>   '4',
            'discount' =>   '30',
            'status' =>   'Aprovado',
        ]);
        
        $sale = new Sales();
        $sale->create($request); // o id dessa venda sera 1
        $saleId = $sale->get_sales_data(1)->id;
        $response = $sale->editSale($request, $saleId);
        $this->assertEquals(302, $response->getStatusCode());  
    }

}

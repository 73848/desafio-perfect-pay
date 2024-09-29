<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Models\Client;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

# php artisan test --filter=SalesViewTest
class SalesViewTest extends TestCase
{


    // teste para ver se os produtos estao sendo enviados para a view edit_sales
    public function test_create_sales_are_showed_only_for_loggeds_corretly(){

       $user = Users::factory(1)->create()->first();
        $this->actingAs($user)->withSession(['user_id' => '1']);
        $response = $this->get('/sales');
        $response->assertViewIs('crud_sales');
        $response->assertStatus(200);
    }
    public function test_edit_sales_are_showed_only_for_admins_corretly(){

        // criando uma venda
        // cliente: 
        $cliente = Client::factory(1)->create()->first();
        // produto
        $product = Product::factory(1)->create()->first();
        $user = Users::factory(1)->create()->first();
         $this->actingAs($user)->withSession(['user_id' => '1', 'role_id' => '1']);
         $response = $this->get('/sales');
         $response->assertViewIs('crud_sales');
         $response->assertStatus(200);
     }
     public function test_edit_sales_are_not_showed_for_users_corretly(){

        $user = Users::factory(1)->create()->first();
         $this->actingAs($user)->withSession(['user_id' => '1', 'role_id' => '2']);
         $response = $this->get(route('sales.show',[]));
         $response->assertViewIs('crud_sales');
         $response->assertStatus(302);
     }
  /*   public function test_crud_sales_data_are_showed_geted_corretly(){

        $user = Users::factory(1)->create()->first();
         $this->actingAs($user)->withSession(['user_id' => '1']);
         $response = $this->get('/sales');
         $response->assertViewIs('crud_sales');
         $response->assertStatus(200);
     } */

    // teste para
    // teste para
    // teste para
    // teste para



}

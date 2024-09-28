<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Models\Users;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

# php artisan test --filter=ProductViewTest
class ProductViewTest extends TestCase
{
    
    use RefreshDatabase;
 

    // teste para ver se os produtos estao sendo enviados para a view dashboard
    public function test_dashboard_are_showed_only_for_usersLogged_corretly(){

        $user = Users::factory()->create();

        $this->actingAs($user)->withSession(['role_id'=>'1', 'user_id'=> '7']);

        $response = $this->get('/');

        $response->assertStatus(200);   
    }
    public function test_dashboard_are_not_showed_only_for_usersLogged_corretly(){

       

        $response = $this->get('/');

        $response->assertStatus(302);   
    }
    // teste para
    // teste para
    // teste para
    // teste para



}

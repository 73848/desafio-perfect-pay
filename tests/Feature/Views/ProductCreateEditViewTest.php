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
 

    // teste para ver se os produtos estao sendo enviados para a view edit_product
    public function test_product_are_passed_corretly(){

        $user = Users::create(['name' => 'Cristiano Messi',
            'email' => 'cristianomessi@gmail.com',
            'role_id' => 1,
            'password' => crypted('atum1234'),])->first();
 
        $response = $this->actingAs($user)
                         ->withSession(['role_id' => $user->role_id])
                         ->get('/');
        

        $response->assertStatus(200);
      
    
    }
    // teste para
    // teste para
    // teste para
    // teste para



}

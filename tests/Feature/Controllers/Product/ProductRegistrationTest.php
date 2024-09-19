<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;

# php artisan test --filter=ProductRegistration
class ProductRegistration extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_product_are_set_correctly(){
        Event::fake();    

        $request = Request::create('/products', 'POST',[ 
         'name'=>'Iphone 7',
        'description'=>'O melhor móvel da atualizade',
        'price' => '800',]);

        $controller = new ProductController;
        $response = $controller->create($request);
                
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('products', ['name'=>'Iphone 7']);
        $this->assertDatabaseHas('products',['description'=>'O melhor móvel da atualizade']);
        $this->assertDatabaseHas('products', ['price' => '800']);
    }

}

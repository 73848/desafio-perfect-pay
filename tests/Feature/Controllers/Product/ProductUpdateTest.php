<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

# php artisan test --filter=ProductUpdate
class ProductUpdate extends TestCase
{   
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_product_are_update_correctly(){
       
        $productToUpdate = Product::create([
        'name'=>'Iphone 7',
        'description'=>'O melhor móvel da atualizade',
        'price' => '800',]);
       
        Event::fake();    

        $request = Request::create('/edit-product/{product}', 'PUT',[ 
            'name'=>'Iphone 15',
            'description'=>'Esse sim é o melhor.',
            'price' => '10000',]);
        
        $product = new ProductController();

        $response = $product->edit($productToUpdate, $request);
        
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('products',[ 
            'name'=>'Iphone 15',
            'description'=>'Esse sim é o melhor.',
            'price' => '10000',]);   
    }

    public function test_product_are_deleted_corretly(){

        $product = new ProductController();
        $productDeleted = Product::create([ 'name'=>'Iphone 15',
        'description'=>'Esse sim é o melhor.',
        'price' => '10000',]);
        $response = $product->delete($productDeleted);

        $this->assertEquals(302, $response->getStatusCode());

    }
}

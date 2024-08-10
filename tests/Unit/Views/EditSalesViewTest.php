<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ProductControllerTest
class EditSalesViewTest extends TestCase
{
    use RefreshDatabase;
    public function test_edit_sales_view(){

        $sales = [];
        foreach(Product::all( ) as $product){
            $client = Client::inRandomOrder()->take(rand(1,10))->pluck('id')->toArray();
            $sales = $product->clients()->attach($client, [
                'quantity' => fake()->numerify('##'), 
                'date' => fake()->date('Y_m_d') ,
                'discount' => fake()->numerify('##'), 
                'status' => fake()->randomElement(['Aprovado', 'Cancelado', 'Devolvido'])]);
        };

        $response = $this->get('/edit-sale/{sale}');

        $response->assertStatus(200);
        $response->assertViewIs('edit_sales');
        $response->assertViewHas('sales', $sales);



    }



}

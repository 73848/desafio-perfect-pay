<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

# php artisan test --filter=SalesPrice
class SalesPrice extends TestCase
{
    use RefreshDatabase;


    public function test_is_getting_sales_price_corretly(){
        $productData = [
            'name' => 'Iphone 7',
            'description' => 'O melhor móvel da atualizade',
            'price' => 800,
        ];

        $product = Product::create($productData);

        $salesDataOne = [
            'quantity' => 4,
            'date' => '2024-08-30',
            'discount' => 100,
            'status' => 'Aprovado'
        ];
        $salesDataTwo = [
            'quantity' => 4,
            'date' => '2024-08-30',
            'discount' => 400,
            'status' => 'Aprovado'
        ];
      
        $salePrice = salesPrice($salesDataOne['quantity'], $salesDataOne['discount'], $product['price']);

        $this->assertEquals(2800, $salePrice);
        
    }

   
    




}

<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

# php artisan test --filter=RequisicaoBancoDeDados
class RequisicaoBancoDeDados extends TestCase
{
    use RefreshDatabase;

    public function test_is_geting_products_data(){
    Product::create([
            'id'=>1001,
            'name' => 'Nintendo 3DS',
            'description' => 'A melhor experiencia em games',
            'price' => 200.00,
        ]);
      Product::create([
            'id'=>1002,
            'name' => 'Nintendo Switch',
            'description' => 'A melhor experiencia em games ate o momemnto',
            'price' => 400.00,
        ]);
        
        
        $data1 = get_products_data(1001);
        $data2 = get_products_data(1002);
        $this->assertIsObject($data1);
        $this->assertIsObject($data2);

        $this->assertEquals(1001, $data1[0]->id);
        $this->assertEquals('Nintendo 3DS', $data1[0]->name);
        $this->assertEquals('A melhor experiencia em games', $data1[0]->description);
        $this->assertEquals(200.00, $data1[0]->price);

        $this->assertEquals(1002, $data2[0]->id);
        $this->assertEquals('Nintendo Switch', $data2[0]->name);
        $this->assertEquals('A melhor experiencia em games ate o momemnto', $data2[0]->description);
        $this->assertEquals(400.00, $data2[0]->price);
    }
   
    




}

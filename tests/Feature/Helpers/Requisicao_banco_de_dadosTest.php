<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

# php artisan test --filter=Requisicao_banco_de_dados
class Requisicao_banco_de_dados extends TestCase
{
    use RefreshDatabase;


    public function test_is_get_products_data(){
         Product::create([
            'id'=>0001,
            'name' => 'Nintendo 3DS',
            'description' => 'A melhor experiencia em games',
            'price' => 200.00,
        ]);
        Product::create([
            'id'=>0002,
            'name' => 'Nintendo Switch',
            'description' => 'A melhor experiencia em games ate o momemnto',
            'price' => 400.00,
        ]);
        
        
        $data = get_products_data();
        $this->assertEquals(0001, $data[0]->id);
        $this->assertEquals('Nintendo 3DS', $data[0]->name);
        $this->assertEquals('A melhor experiencia em games', $data[0]->description);
        $this->assertEquals(200.00, $data[0]->price);

        $this->assertEquals(0001, $data[0]->id);
        $this->assertEquals('Nintendo Switch', $data[1]->name);
        $this->assertEquals('A melhor experiencia em games ate o momemnto', $data[1]->description);
        $this->assertEquals(400.00, $data[1]->price);
    }

   
    




}

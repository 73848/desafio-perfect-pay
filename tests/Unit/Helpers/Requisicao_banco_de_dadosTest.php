<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=HelpersDBAplication
class Requisicao_banco_de_dados extends TestCase
{
   

    public function get_sales_data(){
        
       $sales = 
       [    'product_id' => 30,
            'client_id'=> 2,
            'quantity' => 2, 
            'date' => 30/08/2021,
            'discount' => 100, 
            'status' => 'Aprovado'
       ];

    }

   
    




}

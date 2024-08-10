<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ClientControllerTest
class ClientControllerTest extends TestCase
{
    public function test_client_are_set_correctly(){
        $client = new Client([
            'name'=>'Jhonny Dogs',
            'email'=>'jhonyDogs@gmail.com',
            'cpf'=>'000000000-00'
        ]);

        $this->assertEquals('Jhonny Dogs', $client->name);
        $this->assertEquals('jhonyDogs@gmail.com',$client->email);
        $this->assertEquals('000000000-00', $client->cpf);

        
    }




}

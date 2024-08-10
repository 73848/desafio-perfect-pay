<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=ClientRegistration
class ClientRegistration extends TestCase
{
    public function test_client_are_set_correctly(){
        $clientData = [
            'name'=>'Jhonny Dogs',
            'email'=>'jhonyDogs@gmail.com',
            'cpf'=>'000000000-00'
        ];
        
        $client = Client::factory()->create($clientData);


        
        
        $response = $this->post('/register',$clientData );
        $this->assertDatabaseHas('client', ['email'=>'jhonyDogs@gmail.com']);
        $this->assertDatabaseHas('client',['name'=>'Jhonny Dogs']);
        $this->assertDatabaseHas('client', ['cpf'=>'000000000-00']);

    }




}

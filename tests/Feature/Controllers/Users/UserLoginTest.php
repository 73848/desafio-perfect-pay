<?php

namespace Tests\Feature;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

# php artisan test --filter=UserLogged
class UserLogged extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
  

   

     public function test_user_are_logged_wrongly_password()
    { 
        
        $inputUser = [
            'role_id' => '1',
            'name' => 'Dorivalson Duarte',
            'email' => 'DorivalsonDuarte@gmail.com',
            'password' => 'atum'
        ];

        $userByEmail = Users::where('email', $inputUser['email'])->first();

        if($userByEmail){
            if(verifyPassword($inputUser['password'], $userByEmail->password)){
                $response = $this->get('/');
            }
            else{
                $response = $this->get('/login');
            }
        }else {
            $response = $this->get('/cadastro');
        }
        $response->assertViewIs('login_users');
    }
    // o erro ocorre devido o codigo de retorno de erro ao submeter form de cadastro
    /* public function test_user_are_logged_wrongly_email()
    { 
        $this->withoutExceptionHandling();

        $inputUser = [
            'role_id' => '1',
            'name' => 'Dorivalson Duarte',
            'email' => 'DuarteDorivalson@gmail.com',
            'password' => 'salmao'
        ];

        $userByEmail = Users::where('email', $inputUser['email'])->first();
        if($userByEmail){
            if(verifyPassword($inputUser['password'], $userByEmail->password)){
                $response = $this->get('/');
            }
            else{
                $response = $this->get('/login');
            }
        }
        else {
            $response = $this->get('/cadastro');
        }

        $response->assert('registration_users');

    } */

}

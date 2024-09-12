<?php

namespace Tests\Feature;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
# php artisan test --filter=SalesCreated
class UserCreated extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    public function test_user_are_created_correctly()
    {
        $userData = [
            'role_id' => '1',
            'name' => 'Dorivalson Duarte',
            'email' => 'DorivalsonDuarte@gmail.com',
            'password' => crypted('salmao')
        ];

     
    }
}
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
        $user = Users::create($userData);
        $this->assertDatabaseHas('users', ['role_id' => $user->role_id, 'name' => $user->name,
         'email'=> $user->email, 'password' =>$user->password]);

         $this->assertEquals(true, verifyPassword('salmao', $user->password));

     
    }

    public function test_user_are_updated_correctly()
    {
        $userUpdateData = [
            'role_id' => '1',
            'name' => 'Dorivalson Duarte',
            'email' => 'DuarteDorivalson@gmail.com',
            'password' => crypted('atum')
        ];

        $user = Users::where('name', 'Dorivalson Duarte')->first();

        $user->update($userUpdateData);

        $this->assertDatabaseHas('users', ['role_id' => $userUpdateData['role_id'], 'name' => $userUpdateData['name'],
         'email'=> $userUpdateData['email'], 'password' =>$userUpdateData['password']]);

         $this->assertEquals(true, verifyPassword('atum', $user->password));

     
    }
}

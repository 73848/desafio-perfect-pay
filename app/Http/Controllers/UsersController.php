<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
class UsersController extends Controller
{
    public function create(Request $request){
        $inputForm = $request->validate([
            'role_id' => 'required',
            'name'=> 'required',
            'email'=> 'required|unique:client',
            'password'=> 'required|min:15',
        ]);

        $inputForm['name'] = strip_tags($inputForm['name'] );
        $inputForm['email'] = strip_tags($inputForm['email'] );
        $inputForm['role_id'] = strip_tags($inputForm['role_id'] );
        $inputForm['password'] = strip_tags($inputForm['password'] );

        Users::create($inputForm);

        return redirect(''); // redireciona para pagina de login
        

    }
}

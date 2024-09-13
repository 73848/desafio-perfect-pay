<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;

class UsersController extends Controller
{

    public function index(){
        return view('registration_users');
    }
    public function create(Request $request){
        $inputForm = $request->validate([
            'role_id' => 'required',
            'name'=> 'required',
            'email'=> 'required|unique:client',
            'password'=> 'required|min:8',
        ]);

        $inputForm['name'] = strip_tags($inputForm['name'] );
        $inputForm['email'] = strip_tags($inputForm['email'] );
        $inputForm['role_id'] = strip_tags($inputForm['role_id'] );
        $inputForm['password'] = strip_tags($inputForm['password'] );

        Users::create($inputForm);

        return redirect('/')->with('sucess', "Vendedor cadastrado com sucesso!"); // redireciona para pagina de login

    }

    public function edit(Users $users, Request $request){
        // implementa bloqueio para que apenas admin possam editar login de usuarios
        $input = $request->validate(
          [ 
           'role_id' => 'required',
            'name'=> 'required',
            'email'=> 'required|unique:client',
            'password'=> 'required|min:8',
          ]
       );
       // fazer strip_tags no request do form de update tambem

       $users['role_id'] = $input['role_id']; 
       $users['name'] = $input['name'];
       $users['email'] = $input['email'];
       $users['password'] = $input['password'];

       $users->update($input);

       return redirect('/sales');

    }
}

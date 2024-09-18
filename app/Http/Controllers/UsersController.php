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
    public function indexLogin(){
        return view('login_users');
    }
    public function login(Request $request){
        $input = $request->validate([
            'email'=> 'required|unique:client',
            'password'=> 'required|min:8',
        ]);

        $email = Users::where('email', $input['email'])->first();   
        if($email){
            if(verifyPassword($input['password'], $email->password)){
                return redirect('/')->with(['message' => 'Seja bem vindo!', 'user'=> $email->name,  ]);
            }
            else{
                return redirect()->back()->with(['message'=> 'Senha incorreta.']); // retornar os dados do usuario logado
            }
        }else {
            return redirect('/cadastro')->with('message', 'Usuario não encontrado. Por favor, cadastre-se.');;
        }
    }
    public function create(Request $request){
        $inputForm = $request->validate([
            'role_id' => 'required',
            'name'=> 'required',
            'email'=> 'required|unique:client|email',
            'password'=> 'required|min:8',
        ]);

        $inputForm['name'] = strip_tags($inputForm['name'] );
        $inputForm['email'] = strip_tags($inputForm['email'] );
        $inputForm['role_id'] = strip_tags($inputForm['role_id'] );
        $inputForm['password'] = strip_tags($inputForm['password'] );
        $inputForm['password'] = crypted($inputForm['password']);

        Users::create($inputForm);

        return redirect('/login')->with('message', "Vendedor cadastrado com sucesso!"); // redireciona para pagina de login

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

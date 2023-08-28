<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('site.login',['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        //regras validação
        $regras = [
            'usuario'   => 'email',
            'senha'     => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email'     => 'O campo usuário (e-mail) é obrigatório',
            'senha.required'    => 'O campo senha é obrigatório'
        ];

        //se não passar no validate, será empurrado para a rota antiga
        $request->validate($regras,$feedback);
        print_r($request->all());
    }
}

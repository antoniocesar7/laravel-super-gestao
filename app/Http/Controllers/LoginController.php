<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request){

        //$erro = $request->get('erro');
        $erro = '';
        if($request->get('erro')==1){
            $erro = 'Usuário e ou senha não existe!';
        }
        
        if($request->get('erro')==2){
            $erro = 'Necessário realizar login para ter acesso a página!';
        }
        return view('site.login',['titulo' => 'Login','erro' => $erro]);
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

        //Recuperando os parâmetros do usuário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //echo "Usuário: $email | Senha: $password";
        //echo "<br>";
        //print_r($request->all());

        //iniciando o Model User
        $user = new User();

        $usuario = $user->where('email',$email)->where('password',$password)->get()->first();
        //dd($usuario);
        if(isset($usuario->name)){
            //echo 'Usuário Existe!';
            //dd($usuario);
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            //dd($_SESSION);

            return redirect()->route('app.home');

        }else{
            //echo 'Usuário não existe"';
            return redirect()->route('site.login',['erro' => 1]);
        }
        /*echo '<pre>';
            print_r($usuario);
        echo '<pre>';*/
    }

    public function sair(){
        echo 'SAIR!';
    }
}

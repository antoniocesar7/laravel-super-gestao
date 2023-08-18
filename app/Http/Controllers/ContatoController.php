<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
    //var_dump($_POST);
    // dd($request);
    echo '<pre>';
        print_r($request->all());
    echo '<pre>';
        echo 'nome:'.$request->input('nome');
    echo '<br>';
        echo 'email:'.$request->input('email');
    echo '<br>';

        return view('site.contato');
    }
}

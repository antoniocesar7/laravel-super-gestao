<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request){
        return view('site.contato');
    }//final método contato

    public function salvar(Request $request){
        //dd($request);
        // SiteContato::create($request->all());

        $request->validate([ 
            'nome'           => 'required',
            'telefone'       => 'required',
            'email'          => 'required',
            'motivo_contato' => 'required',
            'mensagem'       => 'required',
        ]);

    }//final método save


}

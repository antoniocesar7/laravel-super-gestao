<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }//final método contato

    public function salvar(Request $request){
        //dd($request);
        // SiteContato::create($request->all());

        $request->validate([ 
            'nome'           => 'required|min:3|max:40',//min=3carac e max 40
            'telefone'       => 'required',
            'email'          => 'email',
            'motivo_contato' => 'required',
            'mensagem'       => 'required|max:2000',
        ]);

    }//final método save


}

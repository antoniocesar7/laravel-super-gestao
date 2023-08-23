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
        

        $request->validate([ 
            //min=3carac e max 40
            'nome'           => 'required|min:3|max:40|unique:site_contatos',
            'telefone'       => 'required',
            'email'          => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem'       => 'required|max:2000',
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

    }//final método save


}

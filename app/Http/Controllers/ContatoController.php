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
        $regras = [
            
                //min=3carac e max 40
                'nome'           => 'required|min:3|max:40|unique:site_contatos',
                'telefone'       => 'required',
                'email'          => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem'       => 'required|max:2000',
            
        ];

        $feedback = [
            // 'nome.required'                 => 'O campo nome precisa ser preenchido!',
            'nome.min'                      => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'                      => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique'                   => 'O campo nome precisa ser único, este nome já existe no banco',
            // 'telefone.required'             => 'O campo telefone precisa ser preenchido!',
            'email.email'                   => 'O campo email precisa ser um email válido!',
            // 'motivo_contatos_id.required'   => 'O campo motivo_contatos_id precisa ser preenchido!',
            // 'mensagem.required'             => 'O campo mensagem precisa ser preenchido!',
            'mensagem.max'                  => 'A mensagem deve ter no máximo 2000 caracteres',
            // ou utilizar a situação abaixo para todos os campos required
            'required' => 'O campo:attribute deve ser preenchido!',
        ];
        $request->validate($regras,$feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

    }//final método save


}

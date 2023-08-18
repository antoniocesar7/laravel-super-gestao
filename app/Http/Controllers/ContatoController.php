<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request){
    //var_dump($_POST);
    // dd($request);
    /*echo '<pre>';
        print_r($request->all());
    echo '<pre>';
        echo 'nome:'.$request->input('nome');
    echo '<br>';
        echo 'email:'.$request->input('email');
    echo '<br>';*/
/****************************************** */    
//primeira forma de gravar no banco de dados
    $contato = new SiteContato();
    $contato->name              = $request->input('nome');
    $contato->telefone          = $request->input('telefone');
    $contato->email             = $request->input('email');
    $contato->motivo_contato    = $request->input('motivo_contato');
    $contato->mensagem          = $request->input('mensagem');
    //print_r($contato);//retorna tudo do array
    echo '<hr>';
    //print_r($contato->getAttributes());//retorna apenas o principal

    $contato->save();

//************************************** */
    /*//outra forma de enviar para o banco
    $contato = new SiteContato();
    //este método retorna todas as informações através de um array associativo
    //para isto precisamos ativar o fillable no model do SiteContato
    $contato->fill($request->all());
    //print_r($contato->getAttributes());
    $contato->save();*/
/************************************** */


    return view('site.contato');
    }
}

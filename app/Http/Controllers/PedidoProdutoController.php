<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        //
        $produtos = Produto::all();
        //dd($produtos);
        $pedido->produtos;//carregamento eager loading
        return view('app.pedido_produto.create',['pedido' => $pedido,'produtos' => $produtos]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Pedido $pedido)
    {
        //
        
            //print_r($pedido->id);//como está vindo direto Pedido $pedido, posso colocar o id diretamente
           //print_r($request->get('produto_id'));//Aqui está vindo pelo Request(formulários...)


           $regras = [
                'produto_id' => 'exists:produtos,id'
           ];

           $feedback = [
                'produto_id.exists' => 'O produto informado não existe'
           ];

           $request->validate($regras,$feedback);
           //echo $pedido->id. ' - '.$request->get('produto_id');

           $pedidoProduto = new PedidoProduto();
           $pedidoProduto->pedido_id    = $pedido->id;
           $pedidoProduto->produto_id   = $request->get('produto_id');
           $pedidoProduto->save();

           return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

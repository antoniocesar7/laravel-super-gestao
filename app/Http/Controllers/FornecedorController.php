<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
     
    public function listar(Request $request){
        //dd($request->all());
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like','%'.$request->input('nome').'%')
                                    ->where('site', 'like','%'.$request->input('site').'%')
                                    ->where('uf', 'like','%'.$request->input('uf').'%')
                                    ->where('email', 'like','%'.$request->input('email').'%')
                                    ->paginate(5);
        //dd($fornecedores);
        return view('app.fornecedor.listar',['fornecedores' => $fornecedores,'request' => $request->all()]);
    }

    public function adicionar(Request $request){
        //print_r($request->all());
        $msg = '';

        //inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            //cadastro
            //echo 'Cadastro';

            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required'      => 'O campo :atribute deve ser preenchido',
                'nome.min'      => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max'      => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min'        => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max'        => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email'   => 'O campo e-mail não foi preenchido corretamente',
            ];

            $request->validate($regras,$feedback);

            //echo 'Chegamos até aqui!!!';

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso!!!';

        }//inclusão

        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg =  'Update realizado com sucesso!!!';
            }else{
                $msg = "ERRO NO UPDATE";
            }

            return redirect()->route('app.fornecedor.editar',['id' => $request->input('id') ,'msg' => $msg]);
        }//edição
        return view('app.fornecedor.adicionar',['id' => $request->input('id') ,'msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        //echo "O ID do fornecedor: ".$id;
        $fornecedor = Fornecedor::find($id);

        //dd($fornecedor);

        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id,$msg = ''){
        echo "Tem certeza que deseja excluir $id";
        if(Fornecedor::find($id)->delete()){//este usa o softdelete, não exclui do banco
            echo "O $id foi excluido!";
            return redirect()->route('app.fornecedor');
        }else{
            echo "Não foi possível excluir!";
            return redirect()->route('app.fornecedor');
        }

       /* if(Fornecedor::find($id)->forceDelete()){//este exclui do banco
            echo "O $id foi excluido!";
            return redirect()->route('app.fornecedor');
        }else{
            echo "Não foi possível excluir!";
            return redirect()->route('app.fornecedor');
        }*/

        
    }
}

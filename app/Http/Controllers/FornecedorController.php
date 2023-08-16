<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome'      => 'Fornecedor1',
                'status'    => 'I',
                'cnpj'      => '0',
                'ddd'       => '',
                'telefone'  => '(19)9 9999-1234'
            ],
            1 => [
                'nome'      => 'Fornecedor2',
                'status'    => 'A',
                'cnpj'      => '1111',
                'ddd'       => '19',
                'telefone'  => '(19)9 8888-1234'
            ],
            2 => [
                'nome'      => 'Fornecedor3',
                'status'    => 'A',
                'cnpj'      => '33333',
                'ddd'       => '16',
                'telefone'  => '(19)9 7777-1234'
            ],
            3 => [
                'nome'      => 'Fornecedor4',
                'status'    => 'A',
                'cnpj'      => '5555',
                'ddd'       => '',
                'telefone'  => '(19)9 6666-1234'
            ],
        ];
    }
}

@extends('app.layouts.basico')

@section('titulo','Produto')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <p>Produto - Editar</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{route('produto.index')}}">Voltar</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>

            </div>

            <div class="informacao-pagina">
               
                <div style="width: 30%; margin-left: auto; margin-right:auto;">
                    <form method="POST" action="" >
                        
                        @csrf
                        <input type="text" name="nome" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}" class="borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}

                        <input type="text" name="descricao" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}" class="borda-preta">
                        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}

                        <input type="text" name="peso" placeholder="Peso:" value="{{$produto->peso ?? old('peso')}}" class="borda-preta">
                        {{$errors->has('peso') ? $errors->first('peso') : ''}}

                        {{-- <input type="text" name="unidade_id" placeholder="Unidade_id" value="" class="borda-preta"> --}}
                        <select name="unidade_id" >
                            <option>Selecione a Unidade de Medida</option>
                                @foreach ($unidades as $unidade )
                                
                                    <option value="{{$unidade->id}}" {{($unidade->id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{$unidade->descricao}}</option>

                                @endforeach
                        </select>
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection
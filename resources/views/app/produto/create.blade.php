@extends('app.layouts.basico')

@section('titulo','Produto')
    @section('conteudo')
        <div class="conteudo-pagina">
            @if(isset($produto->id))
                <p>Editar Produto </p>
            @else
                <p>Adicionar Produto </p>

            @endif
            <div class="titulo-pagina">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{route('produto.index')}}">Voltar</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>

            </div>

            <div class="informacao-pagina">
               
                <div style="width: 30%; margin-left: auto; margin-right:auto;">

                    @if (isset($produto->id))
                        <form method="POST" action="{{route('produto.update',['produto' => $produto->id])}}" >
                        @csrf
                        @method('PUT')
                    @else
                        <form method="POST" action="{{route('produto.store')}}" >
                        @csrf
                    @endif

                    
                        <input type="text" name="nome" placeholder="Nome" value="{{$produto->nome?? old('nome')}}" class="borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}

                        <input type="text" name="descricao" placeholder="Descrição" value="{{$produto->descricao?? old('descricao')}}" class="borda-preta">
                        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}

                        <input type="text" name="peso" placeholder="Peso:" value="{{$produto->peso?? old('peso')}}" class="borda-preta">
                        {{$errors->has('peso') ? $errors->first('peso') : ''}}

                        {{-- <input type="text" name="unidade_id" placeholder="Unidade_id" value="" class="borda-preta"> --}}
                        <select name="unidade_id" >
                            <option>Selecione a Unidade de Medida</option>
                                @foreach ($unidades as $unidade )
                                
                                    <option value="{{$unidade->id}}" {{($produto->unidade_id?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{$unidade->descricao}}</option>

                                @endforeach
                        </select>
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection
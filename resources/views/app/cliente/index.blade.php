@extends('app.layouts.basico')

@section('titulo','Cliente')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <p>Listagem de Clientes </p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{route('cliente.create')}}">Novo</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>

            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right:auto;">
                      {{-- {{$clientes->toJson()}}  --}}
                    
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clientes as $cliente )
                                <tr>
                                    <td>{{$cliente->nome}}</td>
                                    
                                    <td><a href="{{route('cliente.show',['cliente' => $cliente->id])}}">Visualizar</a></td>
                                    <td><a href="{{route('cliente.edit',['cliente' => $cliente->id])}}">Editar</a></td>
                                    <td>
                                        <form id="form_{{$cliente->id}}" method="POST" action="{{route('cliente.destroy',['cliente' => $cliente->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            {{-- <button type="submit">Excluir</button> --}}
                                            <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a> 
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$clientes->toJson()}} --}}
                    {{$clientes->appends($request)->links()}}
                    <br>
                    

                    Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}} )
                    

                </div>
            </div>
        </div>
    @endsection
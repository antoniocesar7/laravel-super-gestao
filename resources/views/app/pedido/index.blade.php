@extends('app.layouts.basico')

@section('titulo','Pedido')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <p>Listagem de Pedidos </p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{route('pedido.create')}}">Novo</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>

            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right:auto;">
                      {{-- {{$pedidos->toJson()}}  --}}
                    
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>Cliente</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pedidos as $pedido )
                                <tr>
                                    <td>{{$pedido->id}}</td>
                                    <td>{{$pedido->cliente_id}}</td>
                                    
                                    <td><a href="{{route('pedido.show',['pedido' => $pedido->id])}}">Visualizar</a></td>
                                    <td><a href="{{route('pedido.edit',['pedido' => $pedido->id])}}">Editar</a></td>
                                    <td>
                                        <form id="form_{{$pedido->id}}" method="POST" action="{{route('pedido.destroy',['pedido' => $pedido->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            {{-- <button type="submit">Excluir</button> --}}
                                            <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a> 
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$pedidos->toJson()}} --}}

                    {{$pedidos->appends($request)->links()}}
                    <br>

                    {{$pedidos->count()}}
                    {{$pedidos->total()}}
                    {{$pedidos->firstItem()}}
                    {{$pedidos->lastItem()}}
                    
                    Exibindo {{$pedidos->count()}} pedidos de {{$pedidos->total()}}
                    
                    (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}} )
                    

                </div>
            </div>
        </div>
    @endsection
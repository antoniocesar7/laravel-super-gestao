@if (isset($produto_detalhe->id))
    <form method="POST" action="{{route('produto.update',['produto' => $produto_detalhe->id])}}" >
        @csrf
@method('PUT')
@else
    <form method="POST" action="{{route('produto-detalhe.store')}}" >
        @csrf
@endif


<input type="text" name="produto_id" placeholder="Id do Produto" value="{{$produto_detalhe->produto_id?? old('produto_id')}}" class="borda-preta">
{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}

<input type="text" name="comprimento" placeholder="Comprimento" value="{{$produto_detalhe->comprimento?? old('comprimento')}}" class="borda-preta">
{{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}

<input type="text" name="largura" placeholder="Largura:" value="{{$produto_detalhe->largura?? old('largura')}}" class="borda-preta">
{{$errors->has('largura') ? $errors->first('largura') : ''}}

<input type="text" name="altura" placeholder="altura:" value="{{$produto_detalhe->altura?? old('altura')}}" class="borda-preta">
{{$errors->has('altura') ? $errors->first('altura') : ''}}
{{-- <input type="text" name="unidade_id" placeholder="Unidade_id" value="" class="borda-preta"> --}}
<select name="unidade_id" >
    <option>Selecione a Unidade de Medida</option>
        @foreach ($unidades as $unidade )
        
            <option value="{{$unidade->id}}" {{($produto_detalhe->unidade_id?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{$unidade->descricao}}</option>

        @endforeach
</select>
{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

<button type="submit" class="borda-preta">Cadastrar</button>
</form>
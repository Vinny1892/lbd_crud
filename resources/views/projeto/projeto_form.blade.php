@extends('layout.index')
@section('content')
@if($setores->isNotEmpty())
    <title>Projeto</title>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div> <p>{{ $error }}</p> </div>
    @endforeach
@endif
@if(isset($projeto))
    <form method="POST" action="{{ route('projeto.update' , ["projeto" => $projeto->id]) }}" >
        @method("PUT")
@else
    <form method="POST" action="{{ route('projeto.store') }}">
                @endif
                @csrf
                <input type="text" name="nome"  placeholder="Digite o nome do projeto" value="{{ $projeto  ? $projeto->nome : old('nome') }}">
                <input type="date" name="data_inicio"  placeholder="Digite a data de início" value="{{ $projeto  ? $projeto->data_inicio : date('Y-m-d') }}">
                <input type="date" name="data_fim"  placeholder="Digite a data de fim" value="{{ $projeto  ? $projeto->data_fim : old('data_fim') }}">
                <select name="setor">
                    @foreach($setores as $setor)
                        <option value="{{$setor->id}}">{{$setor->nome}}</option>
                    @endforeach
                </select>
                <select name="funcionarios[]" multiple>
                    @foreach($funcionarios as $funcionario)
                        <option
                            @if($projeto !== null )
                                @if($projeto->funcionario->isNotEmpty()
                                    and $projeto->funcionario->contains($funcionario) )
                                    selected
                                @endif
                            @endif
                            value="{{$funcionario->id}}"
                        >
                            {{$funcionario->nome}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" >Submit</button>
    </form>
</body>
</html>
@else
    <p>É obrigatoria a criação de um setor antes de criar um projeto</p>
@endif
@endsection

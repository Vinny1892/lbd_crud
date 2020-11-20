@extends('layout.index')
@section('content')
@if($setores->isNotEmpty())
    <title>Projeto</title>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div> <p>{{ $error }}</p> </div>
    @endforeach
@endif
    <link rel="stylesheet" type="text/css" href="{{ asset("css/form.css") }}" >
    <title>Projeto</title>

    @if(isset($projeto))
    <form method="POST" action="{{ route('projeto.update' , ["projeto" => $projeto->id]) }}" >
        @method("PUT")
@else
    <form method="POST" action="{{ route('projeto.store') }}">
                @endif
        <div class="seila">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text"  name="nome"  required class="form-control"  placeholder="Digite o nome do projeto" value="{{ $projeto  ? $projeto->nome : old('nome') }}">
                </div>
                <div class="form-group">
                    <label>Data de Inicio</label>
                    <input type="date" name="data_inicio"  required class="form-control"  value="{{ $projeto  ? $projeto->data_inicio : date('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label>Data Fim</label>
                    <input type="date" name="data_fim"   class="form-control" placeholder="Digite a data de fim" value="{{ $projeto  ? $projeto->data_fim : old('data_fim') }}">
                </div>
                <div class="form-group">
                <label>Setor</label>
                <select name="setor" required class="form-control">
                    @foreach($setores as $setor)
                        <option value="{{$setor->id}}">{{$setor->nome}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Funcionario</label>
                <select name="funcionarios[]" required class="form-control" multiple>
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
                </div>
                <button type="submit" class="btn btn-secondary" >Cadastrar Projeto</button>
        </div>
    </form>
</body>
</html>
@else
    <p>É obrigatoria a criação de um setor antes de criar um projeto</p>
@endif
@endsection

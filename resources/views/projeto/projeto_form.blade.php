@extends('layout.index')
@section('content')
@if($setores->isNotEmpty())
    <title>Projeto</title>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p >{{ $error }}</p>
            </div>    @endforeach
    @endif
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
                <button type="submit"  style="color: whitesmoke" class="btn btn-success" >Cadastrar Projeto</button>
                <a class="btn btn-secondary" href="{{ route('projeto.index') }}">Voltar</a>
        </div>
    </form>
</body>
</html>
@else
                <div class="alert alert-info"><p>É obrigatoria a criação de um <a class="alert-link" href="{{route('setor.create')}}" >setor</a> antes de criar um projeto</p></div>
@endif
@endsection

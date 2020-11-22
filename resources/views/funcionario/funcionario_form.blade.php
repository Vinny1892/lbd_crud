@extends('layout.index')
@section('content')
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
<title>Funcionario</title>

    @if(isset($funcionario))
    <form method="POST" action="{{ route('funcionario.update', ["funcionario" => $funcionario->id]) }}" >
        @method("PUT")
    @else
        <form method="POST" action="{{ route('funcionario.store') }}">
    @endif
        <div class="seila">
        @csrf
        <div class="form-group">
            <label>Nome</label>
        <input type="text" name="nome" required class="form-control" placeholder="Digite o nome do funcionário"
               value="{{ $funcionario ? $funcionario->nome : old('nome') }}">
        </div>
            <div class="form-group">
                <label>CPF</label>
            <input type="text" name="cpf" required class="form-control"  placeholder="Digite o cpf do funcionário"  value="{{ $funcionario ? $funcionario->cpf : old('cpf') }}">
            </div>
           <div form="form-group">
               <label>Endereço</label>
               <input type="text" required class="form-control" name="endereco"  placeholder="Digite o endereco do funcionário"
                      value="{{ $funcionario ? $funcionario->endereco : old('endereco') }}">
           </div>
        <div class="form-group">
            <label>Setor</label>
            <select name="setor" class="form-control" >
                <option value="" ></option>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}"

                    @if(isset($funcionario) && $funcionario->setor()->exists())
                        {{ $funcionario->setor->nome === $setor->nome ? 'selected' : ''  }}
                        @endif
                    >
                        {{"Setor $setor->nome -"}}
                        {{" Departamento " . $setor->departamento->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"  style="color: whitesmoke" class="btn btn-success" >Cadastrar</button>
        <a href="{{ route('funcionario.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
@endsection


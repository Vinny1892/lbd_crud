@extends('layout.index')
@section('content')
@if($funcionarios->isNotEmpty())
        @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<title>Dependente</title>
<link rel="stylesheet" type="text/css" href="{{ asset("css/form.css") }}" >
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p >{{ $error }}</p>
        </div>
    @endforeach
@endif
    @if(isset($dependente))
    <form method="POST" action="{{ route('dependente.update', ["dependente" => $dependente->id]) }}" >
        @method("PUT")
    @else
        <form method="POST" action="{{ route('dependente.store') }}">
    @endif
        @csrf
         <div class="seila" >
         <div class="form-group"  >
             <label style="">Nome</label>
            <input type="text" name="nome"  required class="form-control"  required placeholder="Digite o nome do funcionário"
                   value="{{ $dependente ? $dependente->nome : old('nome') }}" >
         </div>
        <div class="form-group" >
                <label  >CPF</label>
                <input type="text" name="cpf"  required class="form-control" placeholder="Digite o cpf do funcionário"
                   value="{{ $dependente ? $dependente->cpf : old('cpf') }}">
        </div>
         <div class="form-group"  >
              <label  >Data Nascimento</label>
                <input type="date" name="data_nascimento" required  class="form-control"  placeholder="Digite a data nascimento"
                   value="{{ $dependente ? $dependente->data_nascimento : old('data_nascimento') }}" >
         </div>
        <div class="form-group"  >
            <label style="">Funcionario</label>
            <select class="form-control" name="funcionario" required>
                <option value="" ></option>
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"

                    @if(isset($dependente) && $dependente->funcionario()->exists())
                        {{ $dependente->funcionario->nome === $funcionario->nome ? 'selected' : ''  }}
                        @endif
                    >
                        {{$funcionario->nome}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit"  style="color: whitesmoke" class="btn btn-success" >Cadastrar</button>
            <a class="btn btn-secondary"  style="color: whitesmoke" href="{{ route('dependente.index') }}" >Voltar</a>
        </div>
     </div>
    </form>
@else
                <div class="alert alert-info"> <p> prescisa de <a class="alert-link" href="{{ route('funcionario.create') }}">funcionario</a>  um cadastrado  para cadastrar dependente </p></div>
@endif
@endsection


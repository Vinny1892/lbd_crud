@extends('layout.index')
@section('content')
@if($funcionarios->isNotEmpty())
        @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div> <p>{{ $error }}</p> </div>
    @endforeach
@endif
    @if(isset($dependente))
    <form method="POST" action="{{ route('dependente.update', ["dependente" => $dependente->id]) }}" >
        @method("PUT")
    @else
        <form method="POST" action="{{ route('dependente.store') }}">
    @endif
        @csrf
        <input type="text" name="nome"  placeholder="Digite o nome do funcionário"
               value="{{ $dependente ? $dependente->nome : old('nome') }}">
        <input type="text" name="cpf"  placeholder="Digite o cpf do funcionário"
               value="{{ $dependente ? $dependente->cpf : old('cpf') }}">
        <input type="date" name="data_nascimento"  placeholder="Digite a data nascimento"
               value="{{ $dependente ? $dependente->data_nasc : old('data_nascimento') }}" >
        <select name="funcionario">
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
        <button type="submit" >Submit</button>
    </form>
@else
    <p> prescisa de funcionario  cadastrado  para cadastrar dependente </p>
@endif
@endsection


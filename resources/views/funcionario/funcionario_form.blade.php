@extends('layout.index')
@section('content')
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
    @if(isset($funcionario))
    <form method="POST" action="{{ route('funcionario.update', ["funcionario" => $funcionario->id]) }}" >
        @method("PUT")
    @else
        <form method="POST" action="{{ route('funcionario.store') }}">
    @endif
        @csrf
        <input type="text" name="nome"  placeholder="Digite o nome do funcionário"
               value="{{ $funcionario ? $funcionario->nome : old('nome') }}">
        <input type="text" name="cpf"  placeholder="Digite o cpf do funcionário"
               value="{{ $funcionario ? $funcionario->cpf : old('cpf') }}">
        <input type="text" name="endereco"  placeholder="Digite o endereco do funcionário"
               value="{{ $funcionario ? $funcionario->endereco : old('endereco') }}">
        <select name="setor">
            <option value="" ></option>
            @foreach($setores as $setor)
                <option value="{{ $setor->id }}"

                    @if(isset($funcionario) && $funcionario->setor()->exists())
                    {{ $funcionario->setor->nome === $setor->nome ? 'selected' : ''  }}
                    @endif
                >
                    {{$setor->nome}}
                </option>
            @endforeach
        </select>
        <button type="submit" >Submit</button>
    </form>
@endsection


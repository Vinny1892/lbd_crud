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
        @if(isset($departamento))
            <form method="POST" action="{{ route('departamento.update', ["departamento" => $departamento->id]) }}" >
             @method("PUT")
        @else
             <form method="POST" action="{{ route('departamento.store') }}">
        @endif
        @csrf
        <input type="text" name="nome"  placeholder="Digite o nome do departamento"
               value="{{ $departamento ? $departamento->nome : old('nome') }}">
        <select name="id_funcionario_gerente">
         @foreach($funcionarios as $funcionario)
             <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
         @endforeach
        </select>
        <button type="submit" >Submit</button>
    </form>
@endsection

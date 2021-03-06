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
        </div>
        @endforeach
    @endif
    <title>Departamento</title>
    @if(isset($departamento))
            <form method="POST" action="{{ route('departamento.update', ["departamento" => $departamento->id]) }}" >
             @method("PUT")
        @else
             <form method="POST" action="{{ route('departamento.store') }}">
        @endif
        @csrf
         <div class="seila">
             <div class="form-group">
              <label>Nome</label>
             <input type="text" name="nome" class="form-control"  placeholder="Digite o nome do departamento"
                    value="{{ $departamento ? $departamento->nome : old('nome') }}">
             </div>
             <div class="form-group">
                 <label>Gerente</label>
                 <select name="id_funcionario_gerente" class="form-control">
                     <option></option>
                     @foreach($funcionarios as $funcionario)
                         <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                     @endforeach
                 </select>
             </div>

             <button type="submit" style="color:whitesmoke" class="btn btn-success">Cadastrar</button>
             <a  href="{{ route('departamento.index')  }}" class="btn btn-secondary">Voltar </a>
         </div>
    </form>
@endsection

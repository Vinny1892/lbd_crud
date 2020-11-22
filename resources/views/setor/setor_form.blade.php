@extends('layout.index')
@section('content')
@if(sizeof($departamentos) > 0)
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p >{{ $error }}</p>
            </div>
        @endforeach
    @endif
    <title>Setor</title>

    @if(isset($setor))
        <form method="POST" action="{{ route('setor.update' , ["setor" => $setor->id]) }}">
        @method("PUT")
    @else
        <form method="POST" action="{{ route('setor.store') }}">
    @endif
    @csrf
   <div class="seila">
       <div class="form-group">
           <label>Nome</label>
       <input type="text" name="nome"  class="form-control" placeholder="Digite o nome do setor" value="{{ $setor  ? $setor->nome : old('nome') }}">
       </div>
       <div class="form-group">
           <label>Departamento</label>
       <select name="departamento" class="form-control">
           @foreach($departamentos as $departamento)
               <option value="{{$departamento->id}}">{{$departamento->nome}}</option>
           @endforeach
       </select>
       </div>
       <button type="submit"  style="color: whitesmoke" class="btn btn-success" >Cadastrar</button>
       <a class="btn btn-secondary"  style="color: whitesmoke" href="{{ route('setor.index') }}" >Voltar</a>
   </div>
</form>
</body>
</html>
@else
                    <div class="alert alert-info"><p>É obrigatoria a criação de um <a class="alert-link" href="{{ route('departamento.create') }}" >departamento</a> antes de criar um setor</p></div>
@endif
@endsection

@extends('layout.index')
@section('content')
@if(sizeof($departamentos) > 0)
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div> <p>{{ $error }}</p> </div>
        @endforeach
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset("css/form.css") }}" >
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
       <button type="submit" class="btn btn-secondary" >Cadastrar</button>
   </div>
</form>
</body>
</html>
@else
    <p>É obrigatoria a criação de um departamento antes de criar um setor</p>
@endif
@endsection

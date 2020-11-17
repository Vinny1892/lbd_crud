@extends('layout.index')
@section('content')
@if(sizeof($departamentos) > 0)
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div> <p>{{ $error }}</p> </div>
        @endforeach
    @endif
    @if(isset($setor))
        <form method="POST" action="{{ route('setor.update' , ["setor" => $setor->id]) }}">
        @method("PUT")
    @else
        <form method="POST" action="{{ route('setor.store') }}">
    @endif
    @csrf
    <input type="text" name="nome"  placeholder="Digite o nome do setor" value="{{ $setor  ? $setor->nome : old('nome') }}">
    <select name="departamento">
        @foreach($departamentos as $departamento)
            <option value="{{$departamento->id}}">{{$departamento->nome}}</option>
        @endforeach
    </select>
    <button type="submit" >Submit</button>
</form>
</body>
</html>
@else
    <p>É obrigatoria a criação de um departamento antes de criar um setor</p>
@endif
@endsection

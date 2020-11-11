<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departamento</title>
</head>
    <body>
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
        <button type="submit" >Submit</button>
    </form>
    </body>
</html>

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
    <form method="POST" action="{{ route('departamento.post') }}">
        {{ csrf_field() }}
        <input type="text" name="nome"  placeholder="Digite o nome do departamento" value="{{old('nome')}}">
        <button type="submit" >Submit</button>
    </form>
    </body>
</html>

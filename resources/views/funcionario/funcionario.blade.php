<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionário</title>
</head>
<body>
<style type="text/css">
    h1 {
        color:rebeccapurple;
    }
    table,thead,tbody, tr ,td{
        border: 1px solid black;
    }
</style>
<h1>Funcionário</h1>
<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Endereço</th>
        <th>Setor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($funcionarios as $funcionario)
        <tr>
            <td>{{ $funcionario->nome }}</td>
            <td>{{ $funcionario->cpf }}</td>
            <td>{{ $funcionario->endereco }}</td>
            <td>{{ $funcionario->setor->nome }}</td>
            <td><form action="{{ route('funcionario.destroy' , ["funcionario" => $funcionario->id])  }}" method="POST">
                    @csrf @method('DELETE')<button>Apagar</button></form>
                <button href="{{ route('funcionario.edit',[ "funcionario" => $funcionario->id]) }}" >Editar</button></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
<?php
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
<style type="text/css">
    h1 {
        color:rebeccapurple;
    }
    table,thead,tbody, tr ,td{
        border: 1px solid black;
    }
</style>
<h1>Projeto</h1>
<table>
    <thead>
    <tr>
        <th>Projeto</th>
        <th>Setor</th>
        <th>Data de Início</th>
        <th>Data de Fim</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projetos as $projeto)
        <tr>
            <td>{{ $projeto->name }}</td>
            <td>{{ $projeto->setor->nome }}</td>
            <td>{{ $projeto->data_inicio }}</td>
            <td>{{ $projeto->data_fim }}</td>
            <td><form action="{{ route('projeto.destroy' , ["projeto" => $projeto->id])  }}" method="POST">
                    @csrf @method('DELETE')<button>Apagar</button></form>
                <a href="{{ route('projeto.edit',[ "projeto" => $projeto->id]) }}" >Editar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

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
<h1>Setor</h1>
<table>
    <thead>
    <tr>
        <th>Setor</th>
        <th>Departamento</th>
    </tr>
    </thead>
    <tbody>
    @foreach($setores as $setor)
        <tr>
            <td>{{ $setor->nome }}</td>
            <td>{{ $setor->departamento->nome }}</td>
            <td><form action="{{ route('setor.destroy' , ["setor" => $setor->id])  }}" method="POST">
                     @csrf @method('DELETE')<button>Apagar</button></form>
                <a href="{{ route('setor.edit',[ "setor" => $setor->id]) }}" >Editar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

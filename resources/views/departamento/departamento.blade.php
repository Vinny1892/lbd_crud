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
<style type="text/css">
    h1 {
        color:rebeccapurple;
    }
   table,thead,tbody, tr ,td{
        border: 1px solid black;
    }
</style>
<h1>Departamentos</h1>
<table>
    <thead>
       <tr>
           <th>Nome</th>
           <th>Gerente</th>
           <th>Açoes</th>
       </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->nome }}</td>
            <td>{{ $departamento->id_funcionario_gerente }}</td>
            <td>
                <form method="POST" action="{{ route('departamento.destroy',["departamento" => $departamento->id]) }}">
               @csrf @method("DELETE")
                <button>Apagar</button>
                </form>
                <form action="{{ route('departamento.edit' , ["departamento" => $departamento->id]) }}">
                <button>Editar</button>
            </td>
            </form>

            <td>
            <select>
                @if(sizeof($departamento->setor()->get()) <= 0)
                    <option>Não existe setor  nesse Departamento</option>
                @else
                    @foreach($departamento->setor()->get() as $setor)
                        <option>{{ $setor->nome }}</option>
                    @endforeach
                @endif
            </select>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

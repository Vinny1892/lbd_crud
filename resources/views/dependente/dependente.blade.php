@extends('layout.index')
@section('content')
@if($funcionarios->isNotEmpty())
<style type="text/css">
    h1 {
        color:rebeccapurple;
    }
    table,thead,tbody, tr ,td{
        border: 1px solid black;
    }
</style>
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
<h1>Funcionário</h1>
<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Funcionario</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dependentes as $dependente)
        <tr>
            <td>{{ $dependente->nome }}</td>
            <td>{{ $dependente->cpf }}</td>
            <td>{{ $dependente->funcionario->nome }}</td>
            <td>
                <form action="{{ route('dependente.destroy' , ["dependente" => $dependente->id])  }}" method="POST">
                    @csrf @method('DELETE')<button>Apagar</button>
                </form>
                <form action="{{ route('dependente.edit' , ["dependente" => $dependente->id])  }}" method="GET">
                    <button type="submit" >Editar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p> prescisa de funcionario  cadastrado  para cadastrar dependente </p>
@endif
@endsection
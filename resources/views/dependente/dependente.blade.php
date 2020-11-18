@extends('layout.index')
@section('content')
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
        <th>Endereço</th>
        <th>Setor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dependentes as $dependente)
        <tr>
            <td>{{ $dependente->nome }}</td>
            <td>{{ $dependente->cpf }}</td>
            <td>{{ $deṕendente->endereco }}</td>
//             @if($fu->setor()->exists())
//             <td>{{ $funcionario->setor->nome }}</td>
//             @else
                <td></td>
            @endif
            <td><form action="{{ route('funcionario.destroy' , ["funcionario" => $funcionario->id])  }}" method="POST">
                    @csrf @method('DELETE')<button>Apagar</button>
                </form>
                <form action="{{ route('funcionario.edit' , ["funcionario" => $funcionario->id])  }}" method="GET">
                    <button type="submit" >Editar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

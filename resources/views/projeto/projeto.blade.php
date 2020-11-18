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
<h1>Projeto</h1>
<table>
    <thead>
    <tr>
        <th>Projeto</th>
        <th>Setor</th>
        <th>Data de Início</th>
        <th>Data de Fim</th>
        <th>Funcionarios</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projetos as $projeto)
        <tr>
            <td>{{ $projeto->nome }}</td>
            <td>{{ $projeto->setor->nome }}</td>
            <td>{{ $projeto->data_inicio }}</td>
            <td>{{ $projeto->data_fim ?  $projeto->data_fim :'projeto sem final definido'}}</td>
            <td>
                @if(sizeof($projeto->funcionario) > 0)
                <select>
                    @foreach( $projeto->funcionario as $funcionario)
                    <option>{{$funcionario->nome }}</option>
                    @endforeach
                </select>
                @else
                    <p>Nenhum funcionario alocado para este projeto</p>
                @endif
            </td>
            <td>
                <form action="{{ route('projeto.destroy' , ["projeto" => $projeto->id])  }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Apagar</button>
                </form>
                <form method="GET" action="{{ route('projeto.edit',[ "projeto" => $projeto->id]) }}">
                    <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

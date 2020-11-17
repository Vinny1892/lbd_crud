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
        <div>
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div> <p>{{ $error }}</p> </div>
    @endforeach
    @endif
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
@endsection

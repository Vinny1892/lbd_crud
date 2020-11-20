@extends('layout.index')
@section('content')
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
<link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}" >
<title>Setor</title>

<div class="container-titulo">
    <span class="titulo" >Departamento </span>
    <a   class="btn btn-secondary btn-adicionar" href="{{ route('setor.create') }}"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Setor</th>
        <th scope="col">Departamento</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($setores as $setor)
        <tr>
            <td>{{ $setor->nome }}</td>
            <td>{{ $setor->departamento->nome }}</td>
            <td style="padding-left: 0px">
                <div class="row" style="margin:0px;">
                    <div  class="col-sm-2 spacebutton">
                        <form action="{{ route('setor.destroy' , ["setor" => $setor->id])  }}" method="POST">
                            @csrf @method('DELETE') <button class="btn" ><i style="color:red" class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-2 spacebutton">
                        <button class="btn" ><a href="{{ route('setor.edit' , ["setor" => $setor->id])  }}" >
                                <i style="color:yellow"class="far fa-edit"></i></a>
                        </button>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

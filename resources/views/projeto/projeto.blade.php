@extends('layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}" >
<title>Projeto</title>

    <div class="container-titulo">
        <span class="titulo" >Projeto </span>
        <a   class="btn btn-secondary btn-adicionar" href="{{ route('projeto.create') }}"><i class="fas fa-plus"></i></a>
    </div>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col" >Projeto</th>
        <th scope="col" >Setor</th>
        <th scope="col" >Data de Início</th>
        <th scope="col">Data de Fim</th>
        <th scope="col" >Funcionarios</th>
        <th scope="col">Ações</th>
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
                <select class="form-control">
                    @foreach( $projeto->funcionario as $funcionario)
                    <option>{{$funcionario->nome }}</option>
                    @endforeach
                </select>
                @else
                    <p>Nenhum funcionario alocado para este projeto</p>
                @endif
            </td>
            <td style="padding-left: 0px">
                <div class="row" style="margin:0px;">
                    <div  class="col-sm-2 spacebutton">
                        <form action="{{ route('projeto.destroy' , ["projeto" => $projeto->id])  }}" method="POST">
                            @csrf @method('DELETE') <button class="btn" ><i style="color:red" class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-2 spacebutton">
                        <button class="btn" ><a
                                href="{{ route('projeto.edit' , ["projeto" => $projeto->id]) }}" >
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

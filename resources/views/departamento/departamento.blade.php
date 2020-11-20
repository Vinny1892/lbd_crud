@extends('layout.index')
@section('content')
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
<title>Departamento</title>

<link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}" >
<div class="container-titulo">
    <span class="titulo" >Departamento </span>
    <a   class="btn btn-secondary btn-adicionar" href="{{ route('departamento.create') }}"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-dark">
    <thead>
       <tr>
           <th scope="col">Nome</th>
           <th scope="col">Gerente</th>
           <th scope="col">Setores</th>
           <th scope="col">Açoes</th>
       </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->nome }}</td>
            @if($departamento->funcionario()->exists())
            <td>{{ $departamento->funcionario->nome }}</td>
            @else
            <td> Departamento sem gerente</td>
            @endif
            <td style="padding-left: 0px">
                <select class="form-control" style="width: 65%;" >
                    @if(sizeof($departamento->setor()->get()) <= 0)
                        <option>Não existe setor  nesse Departamento</option>
                    @else
                        @foreach($departamento->setor()->get() as $setor)
                            <option>{{ $setor->nome }}</option>
                        @endforeach
                    @endif
                </select>
            </td>
            <td style="padding-left: 0px">
                <div class="row" style="margin:0px;">
                    <div  class="col-sm-2 spacebutton">
                        <form action="{{ route('departamento.destroy' , ["departamento" => $departamento->id])  }}" method="POST">
                            @csrf @method('DELETE') <button class="btn" ><i style="color:red" class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-2 spacebutton">
                        <button class="btn" ><a href="{{ route('departamento.edit' , ["departamento" => $departamento->id])  }}" >
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

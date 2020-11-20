@extends('layout.index')
@section('content')
@if($funcionarios->isNotEmpty())


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
<link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}" >
<title>Dependente</title>

<div class="container-titulo">
    <span class="titulo" >Dependente </span>
    <a   class="btn btn-secondary btn-adicionar" href="{{ route('dependente.create') }}"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-dark" >
    <thead >
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Funcionario</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dependentes as $dependente)
        <tr >
            <td>{{ $dependente->nome }}</td>
            <td>{{ $dependente->cpf }}</td>
            <td>{{ $dependente->funcionario->nome }}</td>
            <td style="padding-left: 0px">
                <div class="row" style="margin:0px;">
                <div  class="col-sm-2 spacebutton">
                <form action="{{ route('dependente.destroy' , ["dependente" => $dependente->id])  }}" method="POST">
                    @csrf @method('DELETE') <button class="btn" ><i style="color:red" class="fas fa-trash"></i></button>
                </form>
                </div>
                <div class="col-sm-2 spacebutton">
                <button class="btn" ><a href="{{ route('dependente.edit' , ["dependente" => $dependente->id])  }}" >
                      <i style="color:yellow"class="far fa-edit"></i></a>
                  </button>
                   </div>
               </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p> prescisa de funcionario  cadastrado  para cadastrar dependente </p>
@endif
@endsection

@extends('layout.index')
@section('content')
<div class="painel-background">
    <div class="row">
        <div class="col-md">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title">Projetos</h5>
                    <p class="card-text">Modulo para criação,edição e exclusão dos projetos da empresa.</p>
                    <a href="{{ route('projeto.index') }}" class="btn btn-secondary">Projeto</a>
                </div>
        </div>
        </div>
            <div class="col-md">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Funcionarios</h5>
                        <p class="card-text">Modulo para criação,edição e exclusão dos funcionarios da empresa.</p>
                        <a href="{{ route('funcionario.index') }}" class="btn btn-secondary">Funcionario</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Departamentos</h5>
                        <p class="card-text">Modulo para criação,edição e exclusão dos departamentos da empresa.</p>
                        <a href="{{ route('departamento.index') }}" class="btn btn-secondary">Departamento</a>
                    </div>
                </div>
        </div>
        <div class="col-md">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Setores</h5>
                        <p class="card-text">Modulo para criação,edição e exclusão dos setores da empresa.</p>
                        <a href="{{ route('setor.index') }}" class="btn btn-secondary">Setor</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dependentes</h5>
                        <p class="card-text">Modulo para criação,edição e exclusão dos dependentes dos funcionarios da empresa.</p>
                        <a href="{{ route('dependente.index') }}" class="btn btn-secondary">Dependente</a>
                    </div>
                </div>
        </div>
    </div>




</div>
@endsection

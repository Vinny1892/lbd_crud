<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Projeto;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetoController extends Controller
{
    public function create()
    {
        $title = "Criar Projeto";
        $funcionarios = Funcionario::all();
        $projeto = null;
        $setores = Setor::all();
        return response()->view('projeto.projeto_form', compact('setores', 'projeto','funcionarios','title'));
    }

    public function index()
    {
        $title = "Projetos";
        $projetos = Projeto::all();
        return response()->view('projeto.projeto', compact('projetos','title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nome" => ["required" , "unique:projeto,nome"],
            "data_inicio" => ["required","date"],
            "data_fim" => ["date"],
            "setor" => ["required"],
            "funcionario" => ["required"]
            ],
            [
                "required" => "O campo :attribute é obrigatório",
            ]
      );
        if($validator->fails()) { return response()->redirectToRoute('projeto.create')->withErrors($validator);}
        $funcionarios = Funcionario::find($request->funcionarios);
        $setor = Setor::find($request->get('setor'));
        $projeto = $setor->projeto()->create([
            "nome" => $request->nome,
            "data_inicio" => $request->data_inicio,
            "data_fim" => $request->data_fim
        ]);
        if ($funcionarios->isNotEmpty())  $projeto->funcionario()->attach($funcionarios);
        return response()->redirectToRoute('projeto.index');
    }
    public function edit(Projeto $projeto, Request $request)
    {
        $title = "Editar $projeto->nome";
        $funcionarios = Funcionario::all();
        $setores = Setor::all();
        return response()->view('projeto.projeto_form', compact('projeto', 'setores','funcionarios','title'));
    }

    public function update(Projeto $projeto, Request $request)
    {
        $validate = Validator::make($request->all(),["nome" => ["required" , "unique:projeto,nome,id,$projeto->id"],
            "data_inicio" => ["required","date"],
            "data_fim" => ["date"],
            "setor" => ["required"],
            "funcionario" => ["required"]]);
        if($validate->fails())  return response()->redirectToRoute('projeto.create')->withErrors($validate);
        $setor = Setor::find($request->setor);
        $funcionarios = Funcionario::find($request->funcionarios);
        $funcionarioRemoverProjeto = $projeto->funcionario->diff($funcionarios);
        $funcionarioAdicionar = $funcionarios->diff($projeto->funcionario);
        if($funcionarioRemoverProjeto->isNotEmpty()) $projeto->funcionario()->detach($funcionarioRemoverProjeto);
        if ( $funcionarioAdicionar->isNotEmpty())  $projeto->funcionario()->attach($funcionarioAdicionar);
        $projeto->setor()->associate($setor);
        $projeto->update([
            "nome" => $request->nome,
            "data_inicio" => $request->data_inicio,
            "data_fim" => $request->data_fim
        ]);
        return response()->redirectToRoute('projeto.index');
    }

    public function destroy(Projeto $projeto)
    {
        $projeto->delete();
        return response()->redirectToRoute('projeto.index');
    }
}

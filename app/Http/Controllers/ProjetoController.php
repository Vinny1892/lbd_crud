<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetoController extends Controller
{
    public function create()
    {
        $projeto = null;
        $setores = Setor::all();
        return response()->view('projeto.projeto_form', compact('setores', 'projeto'));
    }

    public function index()
    {
        $projetos = Projeto::all();
        return response()->view('projeto.projeto', compact('projetos'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nome" => "required",
            "data_inicio" => "required",
        ],
        [
            "required" => "O campo :attribute é obrigatório",
        ],
        [
            "nome" => "nome",
            "data_inicio" => "data de início"
        ]);
        if($validator->fails()) { return response()->redirectToRoute('projeto.create')->withErrors($validator);}
        $setor = Setor::find($request->get('setor'));
        $setor->projeto()->create([
            "nome" => $request->nome,
            "data_inicio" => $request->data_inicio,
            "data_fim" => $request->data_fim
        ]);
        return response()->redirectToRoute('projeto.index');
    }

    public function edit(Projeto $projeto, Request $request)
    {
        $setores = Setor::all();
        return response()->view('projeto.projeto_form', compact('projeto', 'setores'));
    }

    public function update(Projeto $projeto, Request $request)
    {
        $setor = Setor::find($request->setor);
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
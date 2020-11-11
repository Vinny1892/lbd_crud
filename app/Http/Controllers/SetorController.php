<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Setor;
use Illuminate\Support\Facades\Validator;

class SetorController extends Controller
{
    public function create()
    {
        $setor = null;
        $departamentos = Departamento::all();
        return response()->view('setor.setor_form',compact('departamentos','setor'));
    }

    public function index()
    {
        $setores = Setor::all();
        return response()->view('setor.setor', compact('setores'));
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),["nome" => ["required"]],["required" => "Nome Obrigatorio"]);
        if($validator->fails()) { return  response()->redirectToRoute('setor.create')->withErrors($validator);}
        $departamento = Departamento::find($request->get('departamento'));
        $departamento->setor()->create([
            "nome" => $request->nome
        ]);
        return response()->redirectToRoute('setor.index');
    }
    public function edit(Setor $setor , Request $request)
    {
        $departamentos = Departamento::all();
        return response()->view('setor.setor_form',compact('setor','departamentos'));
    }

    public function update(Setor $setor, Request $request)
    {
        $departamento = Departamento::find($request->departamento);
        $setor->departamento()->associate($departamento);
        $setor->update([
            "nome" => $request->nome,
        ]);
        return response()->redirectToRoute('setor.index');
    }
    public function destroy(Setor $setor)
    {
        $setor->delete();
        return response()->redirectToRoute('setor.index');
    }

}

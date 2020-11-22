<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Setor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SetorController extends Controller
{
    public function create()
    {
        $title = "Cadastrar Setor";
        $setor = null;
        $departamentos = Departamento::all();
        return response()->view('setor.setor_form',compact('departamentos','setor','title'));
    }

    public function index()
    {
        $title = "Setores";
        $setores = Setor::all();
        return response()->view('setor.setor', compact('setores','title'));
    }

    public function store(Request $request)
    {
        $departamento = Departamento::find($request->get('departamento'));
        $unique = Rule::unique('setor')->where(function ($query) use($departamento) {
            return $query->where('id_departamento', $departamento->id);
        });
        $validator =  Validator::make($request->all(),["nome" => ["required" , $unique ]],["required" => "Nome Obrigatorio" , "unique" => "Nome deve ser unico"]);
        if($validator->fails()) { return  response()->redirectToRoute('setor.create')->withErrors($validator);}
        $departamento->setor()->create([
            "nome" => $request->nome
        ]);
        return response()->redirectToRoute('setor.index');
    }
    public function edit(Setor $setor , Request $request)
    {
        $title = "Editar Setor $setor->nome";
        $departamentos = Departamento::all();
        return response()->view('setor.setor_form',compact('setor','departamentos' , 'title'));
    }

    public function update(Setor $setor, Request $request)
    {
        $departamento = Departamento::find($request->departamento);
        $validator =  Validator::make($request->all(),
            [ "nome" => ["required",Rule::unique('setor')->where(function ($query) use($departamento) {
            return $query->where('id_departamento', $departamento->id);
        })] ],
            ["required" => "Nome Obrigatorio" , "unique" => "nome deve ser unico"]);
        if($validator->fails())  return  response()->redirectToRoute('setor.edit',["setor" => $setor->id])->withErrors($validator);
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

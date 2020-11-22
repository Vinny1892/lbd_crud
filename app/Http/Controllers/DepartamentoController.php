<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $title = "Departamentos";
    $departamentos = Departamento::all();
    return response()->view('departamento.departamento', compact('departamentos','title'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    $title = "Departamento Formulario";
    $departamento = null;
    $funcionarios = Funcionario::all();
    return response()->view('departamento.departamento_form',compact('funcionarios','departamento','title'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        ["nome" => ["required","unique:departamento,nome"]],["required" => "Nome Obrigatorio", "unique" => "Nome deve ser unico"]
    );
    if($validator->fails()) { return response()->redirectToRoute('departamento.create')->withErrors($validator);
    }

    Departamento::create($request->all());
    return response()->redirectToRoute('departamento.index');
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
public function edit(Departamento $departamento)
{
    $title = "Editar Departamento $departamento->nome";
    $funcionarios = Funcionario::all();
    return response()->view('departamento.departamento_form', compact('departamento', 'funcionarios','title'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, Departamento $departamento)
    {
        $validator = Validator::make($request->all(),
            ["nome" => ["required","unique:departamento,nome,$departamento->id"]],
            ["required" => "Nome Obrigatorio" , "unique" => "nome deve ser unico"]);
        if($validator->fails())  return  response()->redirectToRoute('departamento.edit',["departamento" => $departamento->id])->withErrors($validator);
        $funcionario = Funcionario::find($request->funcionario);
        if($funcionario !== null)   $funcionario->departamento()->associate($departamento);
        $departamento->update([
            "nome" => $request->nome
        ]);
        return response()->redirectToRoute('departamento.index')->with("message","Departamento Atualizado com Sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->redirectToRoute('departamento.index')->with(["message" => "departamento excluido com sucesso"]);
    }
}

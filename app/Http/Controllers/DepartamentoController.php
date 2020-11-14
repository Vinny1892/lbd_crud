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
        $departamentos = Departamento::all();
        return response()->view('departamento.departamento', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = null;
        $funcionarios = Funcionario::all();
        return response()->view('departamento.departamento_form',compact('funcionarios','departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),["nome" => ["required"]],["required" => "Nome Obrigatorio"]);
        if($validator->fails()) { return  response()->redirectToRoute('departamento.create')->withErrors($validator);}
        Departamento::create($request->all());
        return response()->redirectToRoute('departamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $funcionarios = Funcionario::all();
        return response()->view('departamento.departamento_form', compact('departamento', 'funcionarios'));
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
        $validator =  Validator::make($request->all(),
            ["nome" => ["required","unique:departamento,nome,$departamento->id"]],
            ["required" => "Nome Obrigatorio" , "unique" => "nome deve ser unico"]);
        if($validator->fails())  return  response()->redirectToRoute('departamento.edit',["departamento" => $departamento->id])->withErrors($validator);
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

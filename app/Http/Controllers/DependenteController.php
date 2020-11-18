<?php

namespace App\Http\Controllers;

use App\Models\Dependente;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class DependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        $dependentes = Dependente::all();
        return response()->view('dependente.dependente', compact('dependentes','funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependente = null;
        $funcionarios = Funcionario::all();
        return response()->view('dependente.dependente_form', compact('funcionarios','dependente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $funcionario = Funcionario::find($request->funcionario);
       $dependente =  $funcionario->dependente()->create(
            ["nome" => $request->nome,
                "cpf" =>$request->cpf,
                "data_nascimento"=> $request->data_nascimento
            ]);
        return response()->redirectToRoute('dependente.index')
            ->with(["message" =>"Dependente $dependente->nome criado com sucesso"]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependente $dependente)
    {
        $funcionarios = Funcionario::all();
        return response()->view('dependente.dependente_form',compact('dependente','funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Dependente $dependente)
    {
        $funcionario = Funcionario::find($request->funcionario);
        $dependente->funcionario()->associate($funcionario);
        $dependente->update([
           "nome" => $request->nome,
            "cpf" => $request->cpf,
            "data_nascimento" => $request->data_nascimento
        ]);
        return response()->redirectToRoute('dependente.index')
            ->with(["message" => "Dependente $dependente->nome atualizado com sucesso"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Dependente $dependente)
    {
        $dependente->delete();
        return response()->redirectToRoute('dependente.index')
            ->with(["message" => "Dependente $dependente->nome deletado com sucesso"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dependente;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dependentes";
        $funcionarios = Funcionario::all();
        $dependentes = Dependente::all();
        return response()->view('dependente.dependente', compact('dependentes','funcionarios','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Criar Novo Funcionario";
        $dependente = null;
        $funcionarios = Funcionario::all();
        return response()->view('dependente.dependente_form', compact('funcionarios','dependente' ,'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            ["nome" => ["required"] ,
                "data_nascimento" => ["required" , "date"] ,
                "cpf" =>["required","min:11" ,"max:11","unique:dependente,cpf"],
                "funcionario" => ["required"]
            ]
        );
        if($validate->fails())  return response()->redirectToRoute('dependente.create')->withErrors($validate);
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
        $title = "Editar $dependente->nome";
        $funcionarios = Funcionario::all();
        return response()->view('dependente.dependente_form',compact('dependente','funcionarios','title'));
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
        Validator::make($request->all(),[
            "nome" => ["required"],
            "cpf" => ["max:11" ,"min:11" ,"unique:dependente,cpf,id,$dependente->id"],
            "data_nascimento" => ["date","required"]
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{

    public function  index()
    {
        $title = "Funcionarios";
        $funcionarios = Funcionario::all();
        return  response()->view('funcionario.funcionario' , compact('funcionarios','title'));
    }

    public function create()
    {
        $title = "Funcionarios";
        $funcionario = null;
        $setores = Setor::all();
        return response()->view('funcionario.funcionario_form' , compact('setores','funcionario','title'));
    }

    public function store(Request $request)
    {
        $data = ["nome" => $request->nome, "cpf" => $request->cpf, "endereco" => $request->endereco ];
        $validate = Validator::make($data , [
            "nome" => ["required"],
            "cpf" => ["required", "min:11" ,"max:11", "unique:funcionario,cpf"],
            "endereco" => ['required'],
        ]);
        if($validate->fails()) return response()->redirectToRoute('funcionario.create')->withErrors($validate);
         $setor = Setor::find($request->setor);
         try {
            if (isset($setor)) {
              $funcionario = $setor->funcionario()->create($data);
            } else {
              $funcionario =  Funcionario::create($data);
            }
            return response()->RedirectToRoute('funcionario.index')
                        ->with(["message" => "Funcionario $funcionario->nome  criado com sucesso" ]);
        } catch (\Exception $e) {
             Log::error("Erro ao inserir funcionario , messagem: $e->getMessage()");
        }

    }

    public function edit(Funcionario $funcionario)
    {
        $title = "Editar Funcionario $funcionario->nome";
        $setores = Setor::all();
        return response()->view('funcionario.funcionario_form', compact('funcionario','setores','title'));
    }

    public function update(Funcionario $funcionario, Request $request)
    {
        $data = ["nome" => $request->nome, "cpf" => $request->cpf, "endereco" => $request->endereco ];
        $validate = Validator::make($data , [
            "nome" => ["required", ],
            "cpf" => ["required", "unique:funcionario,cpf,$funcionario->id","min:11" ,"max:11"],
            "endereco" => ['required']
        ]);
        if($validate->fails()) return response()->redirectToRoute('funcionario.edit', ['funcionario' => $funcionario->id])->withErrors($validate);
        if(isset($request->setor)) {
            $setor = Setor::find($request->setor);
            $funcionario->setor()->associate($setor);
        }else{
            $funcionario->setor()->disassociate();
        }
        $funcionario->update([
            "nome" => $request->nome,
            "endereco" => $request->endereco,
            "cpf" => $request->cpf
        ]);
        return response()->redirectToRoute('funcionario.index')->with(["message" => "Funcionario $funcionario->nome atualizado com sucesso"]);
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return response()->redirectToRoute('funcionario.index')->with(["message" => "Funcionario $funcionario->nome deletado com sucesso"]);

    }
}

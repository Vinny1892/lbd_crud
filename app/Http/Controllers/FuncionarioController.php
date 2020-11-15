<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FuncionarioController extends Controller
{

    public function  index()
    {
        $funcionarios = Funcionario::all();
        return  response()->view('funcionario.funcionario' , compact('funcionarios'));
    }

    public function create()
    {
        $funcionario = null;
        $setores = Setor::all();
        return response()->view('funcionario.funcionario_form' , compact('setores','funcionario'));
    }

    public function store(Request $request)
    {
        $setor = Setor::find($request->id_setor);
         $data = ["nome" => $request->nome, "cpf" => $request->cpf, "endereco" => $request->endereco];
         try {
            if (isset($setor)) {
              $var =   $setor->funcionario()->create($data);
            } else {
              $var =  Funcionario::create($data);
            }
            return response()->RedirectToRoute('funcionario.index')->with(["message" => "Funcionario criado com sucesso" ]);
        } catch (\Exception $e) {
             Log::error(" Erro ao inserir funcionario , messagem: $e->getMessage()");
        }

    }
}

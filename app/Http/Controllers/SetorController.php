<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    public function create()
    {
        $departamentos = Departamento::all();
        return response()->view('setor.setor_form',compact('departamentos'));
    }

    public function index()
    {
        $setores = Setor::all();
        return response()->view('setor.setor', compact('setores'));
    }

    public function store(Request $request)
    {
        $departamento = Departamento::find($request->get('departamento'));

        $departamento->setor()->create([
            "nome" => $request->nome
        ]);
        return response()->redirectToRoute('setor.index');
    }
}

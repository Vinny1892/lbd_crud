<?php

use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\ProjetoController;

Route::get(
    '/', function () {
        return view('welcome');
    }
);
// Projeto
Route::get('/projeto' , [ProjetoController::class,'index'])->name('projeto.index');
Route::get('/projeto/create', [ProjetoController::class,'create'])->name('projeto.create');
Route::post('/projeto', [ProjetoController::class,'store'])->name("projeto.store");
Route::get('/projeto/edit/{projeto}', [ProjetoController::class,'edit'])->name("projeto.edit");
Route::put('/projeto/{projeto}', [ProjetoController::class,'update'])->name("projeto.update");
Route::delete('projeto/{projeto}',[ProjetoController::class,'destroy'])->name("projeto.destroy");
// Setor
Route::get("/setor" , [SetorController::class,'index'])->name('setor.index');
Route::get('/setor/edit/{setor}', [SetorController::class,'edit'])->name('setor.edit');
Route::get("/setor/create" , [SetorController::class,'create'])->name('setor.create');
Route::post('/setor' , [SetorController::class,'store'])->name('setor.store');
Route::put('/setor/{setor}' , [SetorController::class,'update'])->name('setor.update');
Route::delete('setor/{setor}' , [SetorController::class,'destroy'])->name('setor.destroy');
// Departamento
Route::get('/departamento' , [DepartamentoController::class,'index'])->name('departamento.index');
Route::get('/departamento/create', [DepartamentoController::class,'create'])->name('departamento.create');
Route::post('/departamento', [DepartamentoController::class,'store'])->name("departamento.store");
Route::get('/departamento/edit/{departamento}', [DepartamentoController::class,'edit'])->name("departamento.edit");
Route::put('/departamento/{departamento}', [DepartamentoController::class,'update'])->name("departamento.update");
Route::delete('departamento/{departamento}',[DepartamentoController::class,'destroy'])->name("departamento.destroy");



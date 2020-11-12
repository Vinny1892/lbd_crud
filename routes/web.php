<?php

use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorController;

Route::get(
    '/', function () {
        return view('welcome');
    }
);

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



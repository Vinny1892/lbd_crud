<?php

use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorController;

Route::get(
    '/', function () {
        return view('welcome');
    }
);


Route::get("/setor" , [SetorController::class,'index'])->name('setor.index');
Route::get("/setor/create" , [SetorController::class,'create'])->name('setor.create');
Route::post('/setor' , [SetorController::class,'store'])->name('setor.post');

// Departamento
Route::get('/departamento' , [DepartamentoController::class,'index'])->name('departamento.index');
Route::get('/departamento/create', [DepartamentoController::class,'create']);
Route::post('/departamento', [DepartamentoController::class,'store'])->name("departamento.post");



<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Funcionario extends Controller
{
    use HasFactory;

    protected $table = "funcionario";

    protected $fillable = [
        "name",
        "cpf",
        "endereco",
        "id_setor",
        "id_departamento"
    ];

    public function setor() {
        return $this->belongsTo(Setor::class, "id_setor")
    }
}

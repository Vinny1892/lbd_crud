<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = "funcionario";

    protected $fillable = [
        "nome",
        "cpf",
        "endereco",
        "id_setor"
    ];

    public function setor() {
        return $this->belongsTo(Setor::class, "id_setor",'id');
    }


}

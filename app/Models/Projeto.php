<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = "projeto";

    protected $fillable = [
        "nome",
        "data_inicio",
        "data_fim",
        "id_setor"
    ];

    public function setor() {
        return $this->belongsTo(Setor::class, "id_setor", "id");
    }
    public function  funcionario(){
        return $this->belongsToMany(Funcionario::class,'projeto_funcionario' , 'id_projeto','id_funcionario');
    }
}

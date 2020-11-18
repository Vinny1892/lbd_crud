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

    public function departamento(){
        return $this->belongsTo(Departamento::class,'id_funcionario_gerente' ,'id');
    }
    public function dependente(){
        return $this->hasMany(Dependente::class,'id_funcionario','id');
    }

    public function projeto(){
        return $this->belongsToMany(Projeto::class,'projeto_funcionario' , 'id_funcionario','id_projeto');
    }

}

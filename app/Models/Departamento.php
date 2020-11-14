<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected  $table = 'departamento';

    protected $fillable = [
        "nome",
        "id_funcionario_gerente"
    ];

    public function setor(){
        return $this->hasMany(Setor::class,'id_departamento','id');
    }
    public function funcionario(){
        return $this->hasOne(Funcionario::class, 'id_funcionario_gerente');
    }
}

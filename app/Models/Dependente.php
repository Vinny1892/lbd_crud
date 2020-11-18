<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    use HasFactory;
    protected  $table = "dependente";
    protected $fillable = [
        "nome",
        "data_nascimento",
        "cpf"
    ];
 public function funcionario(){
     return $this->belongsTo(Funcionario::class,'id_funcionario' , 'id');
 }
}

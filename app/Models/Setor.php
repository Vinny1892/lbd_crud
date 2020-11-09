<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "nome",
        "id_departamento"
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class,'id_departamento','id');
    }
}

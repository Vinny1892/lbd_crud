<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = "projeto";

    protected $fillable = [
        "name",
        "data_inicio",
        "data_fim",
        "setor_id"
    ];

    public function setor() {
        return $this->belongsTo(Setor::class, "id_setor", "id");
    }
}

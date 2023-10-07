<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tituloVaga',
        'descricaoVaga',
        'salarioVaga',
        'localVaga',
        'periodoVaga',
        'empresa_id',
        'curso_id',
    ];

    public function curso() {
        return $this->belongsTo('\App\Models\Curso');
    }

    public function empresa() {
        return $this->belongsTo('\App\Models\Empresa');
    }
}

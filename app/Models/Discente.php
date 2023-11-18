<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nomeDiscente',
        'idadeDiscente',
        'periodoDiscente',
        'statusDiscente',
        'descricaoDiscente',
        'telefoneDiscente', 
        'curso_id',
        'user_id',
        'fotoDiscente',
        
    ]; 

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function curso()
    {
        return $this->belongsTo('\App\Models\Curso');
    }
    
}

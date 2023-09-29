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

        'idadeDiscente',
        'periodoDiscente',
        'statusDiscente',
        'descricaoDiscente',
        'telefoneDiscente',
        'area_id',
        'user_id',
        'fotoDiscente',
        
    ]; 

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function area()
    {
        return $this->belongsTo('\App\Models\Area');
    }
   
}

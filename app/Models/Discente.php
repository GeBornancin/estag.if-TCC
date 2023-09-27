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
        'fotoDiscente',
        
    ]; 

    public function area()
    {
        return $this->belongsTo('\App\Models\Area');
    }
   
}

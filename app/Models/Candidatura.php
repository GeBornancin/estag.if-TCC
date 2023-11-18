<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidatura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'discente_id',
        'vaga_id',
        'curriculo',
        'dataCandidatura',
    ]; 
    
    public function discente()
    {
        return $this->belongsTo('App\Models\Discente');
    }
    public function vaga()
    {
        return $this->belongsTo('App\Models\Vaga');
    }

    // protected $casts = [
    //     'curriculo' => 'blob',
    // ];
}

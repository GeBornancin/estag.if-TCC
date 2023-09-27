<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vinculo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'discente_id',
        'empresa_id',
        'orientador_id',
        'statusVinculo',
        'contrato'
    ];
    // protected $casts = [
    //     'contrato' => 'blob',
    // ];

    public function discente()
    {
        return $this->belongsTo('\App\Models\Discente');
    }

    public function empresa()
    {
        return $this->belongsTo('\App\Models\Empresa');
    }

    public function orientador()
    {
        return $this->belongsTo('\App\Models\Orientador');
    }


    

}

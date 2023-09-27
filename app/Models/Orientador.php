<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orientador extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nomeOrientador',
        'statusOrientador',
        'area_id'
    ];

    public function area() {
        return $this->belongsTo('\App\Models\Area');
    }
}


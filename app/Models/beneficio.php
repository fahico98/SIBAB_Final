<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class beneficio extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_beneficio';
    protected $fillable = [
        'nombre_beneficio', 'encargado','estado_beneficio','aux_encargado'
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class convocatoria extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_convocatoria';
    protected $fillable = [
        'fecha_creacion','fecha_inicio','fecha_fin', 'cupos','estado_convocatoria','id_beneficio',
    ];
}

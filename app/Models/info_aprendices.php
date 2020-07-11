<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info_aprendices extends Model
{
    protected $table='informacion_aprendices';
    public $timestamps = false;
    protected $primaryKey = 'id_informacion_aprendiz';
    protected $fillable = [
        'dedicacion_estudio','fecha_inicio','fecha_terminacion', 'jornada', 'horario_formacion', 'horas_centro_formacion', 'tipo_formacion',
    ];
}

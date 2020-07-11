<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulados extends Model
{
    protected $table='postulaciones';
    public $timestamps = false;
	protected $primaryKey = 'id_postulacion';
	protected $fillable = [
		'estado_postulacion', 'id_usuario', 'id_socioeconomico', 'id_savia', 'id_convocatoria', 'puntaje', 'fecha_inicio_beneficio','fecha_fin_beneficio',
	];
}


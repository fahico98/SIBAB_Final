<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asistencia_semanal extends Model
{
    protected $table='asistencia_semanal';

	public $timestamps = false;
	protected $primaryKey = 'id_asistencia_semanal';
	protected $fillable = [
		'nombre_asistencia','fecha_inicio','fecha_fin',
	];
}

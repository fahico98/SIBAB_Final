<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asistenciaos extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_asistenciaos';
	protected $fillable = [
		'numero_documento','primer_nombre','segundo_nombre', 'primer_apellido','segundo_apellido','estrato','telefono','fecha',
	];

}

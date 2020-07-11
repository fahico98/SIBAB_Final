<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class socioeconomico extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_socioeconomico';
	protected $fillable = [
		'fecha','id_datos_formacion','id_vivienda','id_informacion_socioeconomica','id_salud','id_informacion_general','id_datos_aprendiz',
	];
}

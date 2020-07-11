<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asistenciacivica extends Model
{
	protected $table='asistenciacivica';

	public $timestamps = false;
	protected $primaryKey = 'id_asistenciacivica';
	protected $fillable = [
		'fecha','firma','id_postulacion',
	];
}

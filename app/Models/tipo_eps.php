<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_eps extends Model
{
	protected $primaryKey = 'id_tipo_eps';
	protected $fillable = [
		'nombre_tipo',
	];
}

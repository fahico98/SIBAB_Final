<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class regimen extends Model
{
	protected $table='regimen';
	protected $primaryKey = 'id_regimen';
	protected $fillable = [
		'nombre_regimen',
	];
}

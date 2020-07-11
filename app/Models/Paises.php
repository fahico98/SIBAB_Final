<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
	protected $table='paises';
	protected $primaryKey = 'id_pais';
	protected $fillable = [
		'nombre_pais',
	];
}

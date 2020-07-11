<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class generos extends Model
{
	protected $table='generos';
	protected $primaryKey = 'id_genero';
	protected $fillable = [
		'nombre_genero',
	];
}

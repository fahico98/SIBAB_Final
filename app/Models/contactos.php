<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_contacto';
	protected $fillable = [
		'nombre_contacto','telefono_contacto',

	];
}

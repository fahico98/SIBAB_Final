<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
	public $timestamps = false;
	protected $primaryKey ='id_municipios';
	protected $fillable = [
		'nombre_municipio',
	];
}

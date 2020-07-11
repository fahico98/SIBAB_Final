<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hijos extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_hijo';
	protected $fillable = [
		'cantidad','estado_hijos','info_hijos',
	];
}

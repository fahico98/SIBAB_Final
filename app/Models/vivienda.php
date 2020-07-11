<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vivienda extends Model
{
	Protected $table='viviendas';
   	public $timestamps = false;
    protected $primaryKey = 'id_vivienda';
    protected $fillable = [
    	'agua','gas','internet','luz','telefono','tipo_vivienda','otra',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salud extends Model
{
	protected $table='salud';
    public $timestamps = false;
    protected $primaryKey = 'id_salud';
    protected $fillable = [
    	'eps','medico_particular','otros','puntaje_sisben','tiene_eps','id_tipo_eps','id_regimen',
    ];
}

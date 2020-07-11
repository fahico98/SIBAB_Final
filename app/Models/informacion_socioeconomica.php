<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informacion_socioeconomica extends Model
{
	protected $table='informacion_socioeconomica';
    public $timestamps = false;
    protected $primaryKey = 'id_informacion_socioeconomica';
    protected $fillable = [
    	'estado_laboral',
    ];
}

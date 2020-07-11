<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Savia extends Model
{
    protected $table='savia';
    public $timestamps = false;
    protected $primaryKey = 'id_savia';
    protected $fillable = [
    	'id_informacion_postulacion', 'id_informacion_aprendiz',
    ];
}

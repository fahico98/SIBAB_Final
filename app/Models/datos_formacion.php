<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datos_formacion extends Model
{
	protected $table='datos_formacion';
    public $timestamps = false;
    protected $primaryKey = 'id_datos_formacion';
    protected $fillable = [
    	'nombre_programa','numero_ficha','trimestre','alternativa_etapa_practica','centro_formacion','escolaridad','instructor','ocupacion',
    ];
}

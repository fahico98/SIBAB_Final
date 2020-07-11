<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info_postulacion extends Model
{
	protected $table='informacion_postulacion';
    public $timestamps = false;
    protected $primaryKey = 'id_informacion_postulacion';
    protected $fillable = [
        'desplazamiento_forzado', 'nutrientes', 'puntajeSisben', 'regimen_contributivo', 'regimen_subsidiado', 'tres_comidas',
    ];
}

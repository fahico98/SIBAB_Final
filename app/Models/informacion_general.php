<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informacion_general extends Model
{
	protected $table='informacion_general';
    public $timestamps = false;
    protected $primaryKey = 'id_informacion_general';
    protected $fillable = [
    	'km_desplazamiento','beneficio','cabeza_familia','condicionamiento','desplazado','discapacitado','jovenes_en_accion','liderazgo_voluntariado','monitor','patrocinio','proyecto_productivo',',red_unidos','uniparental','victima_conflicto','vocero','certificado_sofia', 'copia_documento', 'copia_servicio_publico',
    ];
}

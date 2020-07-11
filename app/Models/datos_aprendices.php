<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datos_aprendices extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_datos_aprendiz';
    protected $fillable = [
        'area','barrio','celular','direccion','documento_identidad','edad','email','estado_civil','estrato', 'fecha_nacimiento','lugar_expedicion','lugar_nacimiento','primer_apellido','segundo_apellido','primer_nombre','segundo_nombre','telefono_fijo','id_pais_expedicion', 'id_pais_nacimiento','id_tipo_documento','id_hijo','id_contacto','id_genero','id_municipios',
    ];
}

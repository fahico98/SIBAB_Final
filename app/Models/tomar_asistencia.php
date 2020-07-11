<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tomar_asistencia extends Model
{
    protected $table='Tomar_asistencia';
    public $timestamps = false;
    protected $primaryKey = 'id_tomar_asistencia';
    protected $fillable = [
        		'fecha','asistio',
    ];


    public function tipe(){
        return $this->belongsTo('App\Models\datos_aprendices','id_datos_aprendiz');
    }
}

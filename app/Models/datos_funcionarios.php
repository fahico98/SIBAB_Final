<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datos_funcionarios extends Model
{
    protected $table='datos_funcionarios';
    public $timestamps = false;
    protected $primaryKey = 'id_datos_funcionarios';
    protected $fillable = [
        'nombres','apellidos','telefono','id_usuario',
    ];
}

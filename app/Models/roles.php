<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
	   protected $table='roles';
	   protected $primaryKey = 'id_rol';
       protected $fillable = [
        'nombre_rol',
    ];
}

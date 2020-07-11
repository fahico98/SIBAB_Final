<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipos_de_documentos extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_tipo_documento';
    protected $fillable = [
    	'nombre_tipo_documento',
    ];
}

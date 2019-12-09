<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambientes';
    protected $primaryKey = "id_ambiente";
    public $timestamps = false;

    protected $fillable = ['nombre_ambiente', 'oficina_ambiente', 'capacidad_ambiente', 'descripcion_ambiente', 'imagen_ambiente'];
}

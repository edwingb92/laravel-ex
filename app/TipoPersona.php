<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    protected $table = "tipopersona";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}
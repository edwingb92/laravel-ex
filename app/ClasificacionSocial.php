<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasificacionSocial extends Model
{
    protected $table = "clasificacionsocial";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}


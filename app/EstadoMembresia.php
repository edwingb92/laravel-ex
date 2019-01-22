<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoMembresia extends Model
{
    protected $table = "estadomembresia";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}
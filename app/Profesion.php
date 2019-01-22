<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = "profesion";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = "parentesco";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}


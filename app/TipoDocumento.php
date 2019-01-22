<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tipodocumento";
    protected $fillable = ['nombre'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}

public function miembros()
{
    return $this->hasMany(Miembro::class);
}
}
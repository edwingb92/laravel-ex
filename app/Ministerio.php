<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model
{
    protected $table = "ministerio";
    protected $fillable = ['nombre','descripcion','fotoministerio'];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
public function detalleministerio()
{
    return $this->hasMany(DetalleMinisterio::class, 'ministerio_id', 'id')->with('miembro');
}
public function roles()
{
    return $this->hasMany(RolMinisterio::class, 'ministerio_id', 'id')->with('detalleministerio');
}


}
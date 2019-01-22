<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolMinisterio extends Model
{
    protected $table = "roles";
    protected $fillable = ['nombre','ministerio_id',];


public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
public function detalleministerio()
{
    return $this->hasMany(DetalleMinisterio::class, 'roles_id', 'id')->with('miembro');
}

}
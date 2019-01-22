<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolMinisterio extends Model
{
    protected $table = "roles";
    protected $fillable = ['nombre','ministerio_id',];


public function detalleministerio()
{
    return $this->hasMany(DetalleMinisterio::class, 'roles_id', 'id')->with('miembro');
}

}
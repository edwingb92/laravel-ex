<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tipodocumento";
    protected $fillable = ['nombre'];


public function miembros()
{
    return $this->hasMany(Miembro::class);
}
}
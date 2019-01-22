<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    protected $table = "tipopersona";
    protected $fillable = ['nombre'];

}
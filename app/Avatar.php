<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = "avatars";
    protected $fillable = ['nombre','descripcion','url'];


}
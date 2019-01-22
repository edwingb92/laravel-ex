<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = "familia";
    protected $fillable = ['nombre'];


public function detallefamilia()
{
    return $this->hasMany(DetalleFamilia::class, 'familia_id', 'id');
}

}
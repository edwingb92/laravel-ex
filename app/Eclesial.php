<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eclesial extends Model
{
    protected $table = "miembro_eclesial";
    protected $guarded = ['id'];

    public function miembro()
    {
            return $this->belongsTo(Miembro::class,  'miembros_id', 'id');        
    }
    
}


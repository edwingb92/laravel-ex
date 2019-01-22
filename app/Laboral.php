<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboral extends Model
{
    protected $table = "miembro_laboral";
    protected $guarded = ['id'];

    public function miembro()
    {
            return $this->belongsTo(Miembro::class,  'miembros_id', 'id');        
    }
    
}


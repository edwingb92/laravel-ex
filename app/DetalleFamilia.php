<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFamilia extends Model
{
    protected $table = "detalle_familia";
    protected $guarded = ['id'];

    public function miembro()
    {
            return $this->belongsTo(Miembro::class,  'miembros_id', 'id');        
    }
    public function familia()
    {
            return $this->belongsTo(Familia::class,  'familia_id', 'id');        
    }
    
}


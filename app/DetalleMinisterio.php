<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMinisterio extends Model
{
    protected $table = "detalle_ministerio";
    protected $guarded = ['id'];

    public function miembro()
    {
            return $this->belongsTo(Miembro::class,  'miembros_id', 'id');        
    }
    public function ministerio()
    {
            return $this->belongsTo(Ministerio::class,  'ministerio_id', 'id');        
    }
    public function rol()
    {
            return $this->belongsTo(RolMinisterio::class,  'roles_id', 'id');        
    }
    
}


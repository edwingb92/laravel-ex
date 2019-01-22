<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = "miembro_observaciones";
    protected $fillable = ['miembros_id','nombre','fecha','descripcion','users_id'];

    public function miembro()
    {
            return $this->belongsTo(Miembro::class,  'miembros_id', 'id');        
    }
    public function user()
    {
            return $this->belongsTo(Miembro::class,  'users_id', 'id');   
    }

public function scopeNombre($query,$nombre)
{
    if($nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
}

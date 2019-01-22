<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = "miembros";
    protected $guarded = ['id'];

    public function tipodocumento()
    {
       
            return $this->belongsTo(TipoDocumento::class);        
    }
    public function tipopersona()
    {
       
            return $this->belongsTo(TipoPersona::class);        
    }
    public function clasificacionsocial()
    {
       
            return $this->belongsTo(ClasificacionSocial::class);        
    }
    public function estadocivil()
    {
       
            return $this->belongsTo(EstadoCivil::class);        
    }
    public function estadomembresia()
    {
       
            return $this->belongsTo(EstadoMembresia::class);        
    }
    public function avatars()
    {
       
            return $this->belongsTo(Avatar::class);        
    }
    public function profesion()
    {
       
            return $this->belongsTo(Profesion::class);        
    }

        public function eclesial()
{
    return $this->hasOne(Eclesial::class,  'miembros_id', 'id');
}
public function laboral()
{
    return $this->hasOne(Laboral::class, 'miembros_id', 'id');
}

public function detallefamilia()
{
    return $this->hasOne(DetalleFamilia::class, 'miembros_id', 'id');
}

public function observaciones()
{
    return $this->hasMany(Observacion::class, 'miembros_id', 'id');
}

public function user()
{
    return $this->hasMany(User::class, 'miembros_id', 'id');
}

public function detalleministerio()
{
    return $this->hasMany(DetalleMinisterio::class, 'miembros_id', 'id')->with('rol');
}
}


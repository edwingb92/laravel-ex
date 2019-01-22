<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = "inventarios";
    protected $guarded = ['id'];

    public function categoria()
    {
       
            return $this->belongsTo(CategoriaInventario::class);        
    }
    public function almacen()
    {
       
            return $this->belongsTo(AlmacenInventario::class);        
    }
 
}


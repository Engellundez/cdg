<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaCuenta extends Model
{
    protected $fillable = [
        'venta_id', 'producto_id', 'cantidad',
    ];
    
    public function Envasados(){
        return $this->belongsTo('App\Envasado', 'producto_id');
    }
}

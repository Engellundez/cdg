<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'correo', 'negocio', 'comision_id',
    ];

    public function Comicions(){
        return $this->belongsTo('App\Comicion', 'comision_id');
    }
}

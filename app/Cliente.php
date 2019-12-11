<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'correo', 'negocio', 'comision_id', 'user_id',
    ];

    public function Comicions(){
        return $this->belongsTo('App\Comicion', 'comision_id');
    }

    public function Users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}

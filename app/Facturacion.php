<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $fillable = [
        'cliente_id', 'razon_social', 'rfc', 'domicilio_fiscal', 'correo', 'telefono',
    ];

    public function Clientes(){
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }
}

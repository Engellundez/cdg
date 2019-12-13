<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'fecha', 'total', 'autoriza', 'user_id', 'cliente_id', 'factura', 'comision_id', 'fpago_id', 'CVyFP', 'descripcion', 'devoluciones',
    ];

    public function Envasados(){
        return $this->belongsTo('App\Envasado', 'producto_id');
    }

    public function Clientes(){
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

    public function Users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function Auto(){
        return $this->belongsTo('App\User', 'autoriza');
    }

    public function Comicions(){
        return $this->belongsTo('App\Comicion', 'comision_id');
    }

    public function Fpagos(){
        return $this->belongsTo('App\Fpago', 'fpago_id');
    }
}

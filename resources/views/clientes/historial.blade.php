@extends('layouts.app')

@section('titulo')
Nuevos Clientes
@endsection

@section('contenido')
    <table class="table table-striped table-dark" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">Producto</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Total</th>
                <th scope="col">Autorizo</th>
                <th scope="col">Vendio</th>
                <th scope="col">Status</th>
                <th scope="col">Pago</th>
                <th scope="col">CVyFP</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Devoluciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cliente as $c)
                <tr>
                    <th scope="row">{{$c->Clientes->nombre}}</th>
                    <td>{{$c->fecha}}</td>
                    <td>
                        <ul>
                            @foreach($productos as $p)
                                @if($p->venta_id == $c->id)
                                    <li>{{$p->Envasados->producto}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($productos as $p)
                                @if($p->venta_id == $c->id)
                                    <li style="color: #3ed626;">${{$tot = $p->Envasados->precio * $p->cantidad}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <th style="color: #3ed626;">${{$c->total}}</th>
                    <td>{{$c->Auto->name}}</td>
                    <td>{{$c->Users->name}}</td>
                    <td>{{$c->Comicions->Tipo_cliente}}</td>
                    <td>{{$c->Fpagos->descripcion}}</td>
                    <td>{{$c->CVyFP}}</td>
                    <td>{{$c->descripcion}}</td>
                    <td>{{$c->devoluciones}}</td>
                </tr>
            @endforeach
            <input type="hidden" value="{{$totalfinal = 0}}">
            @foreach($total as $t)
                <input type="hidden" value="{{$totalfinal = $totalfinal + $t->total}}">
            @endforeach
            <tr>
                <th scope="row" colspan="6">TOTAL:</th>
                <th colspan="6" style="color: #3ed626;">${{$totalfinal}}</th>
            </tr>
        </tbody>
    </table>
    {{$cliente->links()}}
@endsection
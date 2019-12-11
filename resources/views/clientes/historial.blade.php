@extends('layouts.app')

@section('titulo')
Nuevos Clientes
@endsection

@section('contenido')
<div>
    <table class="table table-striped table-dark" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">Producto</th>
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
        <input type="hidden" value="{{$totfin = 0}}">
            @foreach($cliente as $c)
                <tr>
                    <th scope="row">{{$c->Clientes->nombre}}</th>
                    <td>{{$c->fecha}}</td>
                    <td>{{$c->Envasados->producto}} - {{$c->Envasados->descripcion}}</td>
                    <th>${{$c->Envasados->precio * $c->cantidad}}</th>
                    <input type="hidden" value="{{$totfin = $totfin + $c->Envasados->precio * $c->cantidad}}">
                    <td>{{$c->Auto->name}}</td>
                    <td>{{$c->Users->name}}</td>
                    <td>{{$c->Comicions->Tipo_cliente}}</td>
                    <td>{{$c->Fpagos->Descripcion}}</td>
                    <td>{{$c->CVyFP}}</td>
                    <td>{{$c->descripcion}}</td>
                    <td>{{$c->devoluciones}}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">TOTAL En esta pagina:</th>
                <th colspan="10">${{$totfin}}</th>
            </tr>
        </tbody>
    </table>
    {{$cliente->links()}}
</div>
@endsection
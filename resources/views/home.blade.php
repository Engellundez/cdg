@extends('layouts.app')

@section('titulo')
Hecho en Michoacán
@endsection

@section('contenido')
<a href="{{route('venta.create')}}">
    <button type="button" class="btn btn-success btn-lg btn-block">REALIZAR NUVEA VENTA</button>
</a>
<br>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Foloio de venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio U</th>
            <th scope="col">Total</th>
            <th scope="col">Autoriza</th>
            <th scope="col">Entrega</th>
            <th scope="col">Cliente / Contacto</th>
            <th scope="col">Req Factura</th>
            <th scope="col">Tipo de Cliente</th>
            <th scope="col">Politica de precio precio</th>
            <th scope="col">CVyFP</th>
            <th scope="col">Ver detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($venta as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->fecha}}</td>
                <td>{{$item->Envasados->producto}}</td>
                <td>{{$item->cantidad}}</td>
                <td>${{$item->Envasados->precio}}</td>
                <td>${{$total = $item->cantidad * $item->Envasados->precio}}</td>
                <td>{{$item->Auto->name}}</td>
                <td>{{$item->Users->name}}</td>
                <td>{{$item->Clientes->nombre}}</td>
                <td>
                    @if($item->factura == 0)
                        {{_('NO')}}
                    @elseif($item->factura == 1)
                        {{_('SI')}}
                    @else
                        {{_('Informacion desconocida')}}
                    @endif                
                </td>
                <td>{{$item->Comicions->Tipo_cliente}}</td>
                <td>{{$item->Fpagos->descripcion}}</td>
                <td>{{$item->CVyFP}}</td>
                <td>
                    <a href="{{route('venta.show', $item)}}">
                        <button type="submit" class="btn btn-outline-info">
                            Ver detalles
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$venta->links()}}
@endsection

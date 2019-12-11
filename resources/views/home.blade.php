@extends('layouts.app')

@section('titulo')
Hecho en Michoacán
@endsection

@section('contenido')
<a href="{{route('venta.create')}}">
    <button type="button" class="btn btn-success btn-lg btn-block">REALIZAR NUVEA VENTA</button>
</a>
<br>
<table class="table table-striped table-dark responsive" style="text-align:center;">
    <thead>
        <tr>
            <th scope="col">Foloio de venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio U</th>
            <th scope="col">Total</th>
            <th scope="col">Cliente / Contacto</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($venta as $item)
            <tr>
                <th scope="row" style="color:red;">{{$item->id}}</th>
                <td>{{$item->fecha}}</td>
                <td>{{$item->Envasados->producto}}</td>
                <td>{{$item->cantidad}}</td>
                <td style="color: #3ed626;">${{$item->Envasados->precio}}</td>
                @if(($item->cantidad * $item->Envasados->precio) == 0)
                    <td style="color:yellow;">${{$total = $item->cantidad * $item->Envasados->precio}}</td>
                @elseif(($item->cantidad * $item->Envasados->precio) <= -1)
                    <td style="color:red;">${{$total = $item->cantidad * $item->Envasados->precio}}</td>
                @elseif(($item->cantidad * $item->Envasados->precio) >= 1)
                    <td style="color: #3ed626;">${{$total = $item->cantidad * $item->Envasados->precio}}</td>
                @endif
                <td>{{$item->Clientes->nombre}}</td>
                <td>
                    <a href="{{route('venta.show', $item)}}">
                        <button type="submit" class="btn btn-info">
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

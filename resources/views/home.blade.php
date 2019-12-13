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
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Total</th>
            <th scope="col">Factura</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($venta as $item)
            <tr>
                <th scope="row" style="color:red;">{{$item->id}}</th>
                <td>
                    <ul>
                        @foreach($vencue as $vc)
                            @if($vc->venta_id == $item->id)
                                <li>{{$vc->Envasados->producto}}: {{$vc->Envasados->descripcion}}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($vencue as $vecu)
                            @if($vecu->venta_id == $item->id)
                                <li>{{$vecu->cantidad}}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($vencue as $v)
                            @if($v->venta_id == $item->id)
                                <li>${{$totalfinfinal = $v->Envasados->precio * $v->cantidad}}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                    @if($item->total == 0)
                        <td style="color:yellow;">${{$item->total}}</td>
                    @elseif($item->total <= -1)
                        <td style="color:red;">${{$item->total}}</td>
                    @elseif($item->total >= 1)
                        <td style="color: #3ed626;">${{$item->total}}</td>
                    @endif
                <td>
                    @if($item->factura == 0)
                        {{_('NO')}}
                    @else
                        {{_('SI')}}
                    @endif
                </td>
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

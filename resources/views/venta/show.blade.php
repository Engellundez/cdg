@extends('layouts.app')

@section('titulo')
Ver detalle de venta {{$venta->id}}
@endsection

@section('contenido')
<div style="text-align:center;">
<h1>Detalles de la venta con folio de venta <span style="color:red;"> {{$venta->id}} </span></h1>

    <table class="table table-striped table-dark">
        <tbody>
            <tr>
                <td>
                    Fecha en que se ralizo la venta
                </td>
                <td>
                    {{$venta->fecha}}
                </td>
            </tr>
            <tr>
                <td>
                    numero de folio
                </td>
                <td style="color: red;">
                    {{$venta->id}}
                </td>
            </tr>
            <tr>
                <td>
                    Productos
                </td>
                <td>
                    <ul>
                        @foreach($vc as $v)
                            @if($v->venta_id == $venta->id)
                                <li>{{$v->Envasados->producto}} con codigo <a style="color:#1ca2d4;">{{$v->Envasados->codigo_producto}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    Precio Unitario y Cantidad
                </td>
                <td>
                    <ul>
                        @foreach($vc as $v1)
                            @if($v1->venta_id == $venta->id)
                                <li><a style="color:#3ed626;">${{$v1->Envasados->precio}}</a>, {{$v1->cantidad}}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL
                </td>
                @if($venta->total >= 1)
                    <td style="color: #3ed626;">
                        ${{$venta->total}}
                    </td>
                @elseif($venta->total <= -1)
                    <td style="color: red;">
                        ${{$venta->total}}
                    </td>
                @elseif($venta->total == 0)
                    <td style="color: yellow;">
                        ${{$venta->total}}
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    Forma de pago
                </td>
                <td>
                    {{$venta->Fpagos->codigo_venta}} - {{$venta->Fpagos->descripcion}}
                </td>
            </tr>
            <tr>
                <td>
                    Fue autorizado por
                </td>
                <td>
                    {{$venta->Auto->name}}
                </td>
            </tr>
            <tr>
                <td>
                    lo vendio
                </td>
                <td>
                    {{$venta->Users->name}}
                </td>
            </tr>
            <tr>
                <td>
                    Compro
                </td>
                <td>
                    <li>{{$venta->Clientes->nombre}}</li>
                    <li>Telefono: {{$venta->Clientes->telefono}}</li>
                    <li>Direccion: {{$venta->Clientes->direccion}}</li>
                    <li>Negocio: {{$venta->Clientes->negocio}}</li>
                    <li>Correo electronico: {{$venta->Clientes->correo}}</li>
                    <li>Registrado en la fecha: {{$venta->Clientes->created_at}}</li>
                </td>
            </tr>
            <tr>
                <td>
                    Tipo de cliente
                </td>
                <td>
                    <li>{{$venta->Comicions->Tipo_cliente}}</li>
                    <li>Codigo: {{$venta->Comicions->codigo_cliente}}</li>
                    <li>Rango: {{$venta->Comicions->descripción}}</li>
                    <li>Comision: {{$venta->Comicions->comision}}%</li>
                </td>
            </tr>
            <tr>
                <td>
                    Ocupaba factura
                </td>
                <td>
                    
                        @if($venta->factura == 0)
                            {{_('No ocupa Factura')}}
                        @else
                            {{_('Si ocupa Factura')}}
                        @endif
                    
                </td>
            </tr>
            <tr>
                <td>
                    CVyFP
                </td>
                <td>
                    {{$venta->CVyFP}}
                </td>
            </tr>
            <tr>
                <td>
                    Observaciones
                </td>
                <td>
                    {{$venta->descripcion}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('titulo')
Cliente-Factura
@endsection

@section('contenido')
    <table class="table" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Razon social</th>
                <th scope="col">RFC</th>
                <th scope="col">Domicilio Fiscal</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$fac->Clientes->nombre}}</th>
                <td>{{$fac->razon_social}}</td>
                <td>{{$fac->rfc}}</td>
                <td>{{$fac->domicilio_fiscal}}</td>
                <td>{{$fac->correo}}</td>
                <td>{{$fac->telefono}}</td>
                @if(Auth::user()->rol_id == 1)
                    <td><a href="{{route('ventaa.edit', $fac->cliente_id)}}"><button class="btn btn-info">EDITAR</button></a></td>
                    <td><form action="{{route('eliminar', $fac->id)}}" method="post">@method('delete')@csrf <button type="submit" class="btn btn-danger">ELIMINAR</button></form></td>
                @else
                @endif
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection
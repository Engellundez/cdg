@extends('layouts.app')

@section('titulo')
Clientes
@endsection

@section('contenido')
<a href="#">
    <button type="button" class="btn btn-success btn-lg btn-block">Nuevo cliente</button>
</a>
<br>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Negocio</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo de Cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cliente as $item)
            <tr>
                <th scope="row">{{$item->nombre}}</th>
                <td>{{$item->negocio}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->Comicions->codigo_cliente}} - {{$item->Comicions->descripción}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$cliente->links()}}
@endsection

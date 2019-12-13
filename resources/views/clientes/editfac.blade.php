@extends('layouts.app')

@section('titulo')
Clientes
@endsection

@section('contenido')
    @if(session('mensaje'))
        <div class="alerta alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
<form action="{{route('ventaa.update', $factura->id)}}" method="post">
@method('PUT')
@csrf
    <div class="row">
        <div class="col">
            <label>Nombre del Cliente</label>
            <input type="text" disabled class="form-control" required value="{{$cliente->nombre}}">
            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
        </div>
        <div class="col">
            <label>Razon Social</label>
            <input type="text" class="form-control" name="razon_social" required value="{{$factura->razon_social}}">
        </div>
        <div class="col">
            <label>RFC</label>
            <input type="text" style="text-transform:uppercase;" minlength="13" name="rfc" required class="form-control" value="{{$factura->rfc}}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Domicilio Fiscal</label>
            <input type="text" class="form-control" name="domicilio_fiscal" required value="{{$factura->domicilio_fiscal}}">
        </div>
        <div class="col">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" required value="{{$factura->correo}}">
        </div>
        <div class="col">
            <label>Telefono</label>
            <input type="number" min="10" style="text-transform:uppercase;" name="telefono" required class="form-control" value="{{$factura->telefono}}">
        </div>
    </div><br><br>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <button type="submit" class="btn btn-info btn-lg btn-block">ACTUALIZAR INFORMACION</button>
        </div>
        <div class="col"></div>
    </div>
</form>
@endsection
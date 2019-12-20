@extends('layouts.app')

@section('titulo')
Clientes
@endsection

@section('contenido')
<form action="{{route('guardar')}}" method="post">
@method('POST')
@csrf
    <div class="row">
        <div class="col">
            <label>Nombre del Cliente</label>
            <input type="text" disabled class="form-control" required value="{{$cliente->nombre}}">
            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
        </div>
        <div class="col">
            <label>Razon Social</label>
            <input type="text" class="form-control" name="razon_social" required placeholder="NOMBRE O EMPRESA">
        </div>
        <div class="col">
            <label>RFC</label>
            <input type="text" style="text-transform:uppercase;" minlength="13" name="rfc" required class="form-control" placeholder="RFC CON HOMOCLAVE">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Domicilio Fiscal</label>
            <input type="text" class="form-control" name="domicilio_fiscal" required placeholder="domicilio, numero, colonia, etc">
        </div>
        <div class="col">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" required placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="col">
            <label>Telefono</label>
            <input type="number" min="10" style="text-transform:uppercase;" name="telefono" required class="form-control" placeholder="telefono">
            <input type="hidden" name="factura" value="1" required>
            <input type="hidden" name="id_user" value="{{$cliente->id}}">
        </div>
    </div><br><br>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <button type="submit" class="btn btn-success btn-lg btn-block">AGREGAR INFORMACION</button>
        </div>
        <div class="col"></div>
    </div>
</form>
@endsection
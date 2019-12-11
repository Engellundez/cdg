@extends('layouts.app')

@section('titulo')
Nuevos Clientes
@endsection

@section('contenido')
    @if(session('mensaje'))
        <div class="alerta alert-warning">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="container" style="text-align:center;">
        <form action="{{route('clientes.update', $clie->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col">
                    <label><span style="color:red;">*</span>Nombre completo</label>
                    <input type="text" required name="nombre" class="form-control" value="{{$clie->nombre}}">
                    <label><span style="color:red;">*</span>Negocio (nombre)</label>
                    <input type="text" required name="negocio" class="form-control" value="{{$clie->negocio}}">
                    <label><span style="color:red;">*</span>Tipo de cliente</label>
                    <select name="comision_id" id="comision_id" required class="form-control" style="text-align:center;">
                        <option value="{{$clie->comision_id}}">{{$clie->Comicions->codigo_cliente}} - {{$clie->Comicions->Tipo_cliente}}:  {{$clie->Comicions->descripción}}</option>
                        @foreach($comi as $c)
                            <option value="{{$c->id}}">{{$c->Tipo_cliente}}: {{$c->descripción}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label><span style="color:red;">*</span>Telefono</label>
                    <input type="number" required name="telefono" class="form-control" value="{{$clie->telefono}}">
                    <label><span style="color:red;">*</span>Dirección</label>
                    <input type="text" required name="direccion" class="form-control" value="{{$clie->direccion}}">
                    <label><span style="color:red;">*</span>Correo</label>
                    <input type="email" required name="correo" class="form-control" value="{{$clie->correo}}">
                </div>
            </div><br><br>
            <button type="submit" class="btn btn-warning">Actualizar Cliente</button>
        </form>
    </div>
@endsection
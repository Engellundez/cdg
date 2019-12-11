@extends('layouts.app')

@section('titulo')
Nuevos Clientes
@endsection

@section('contenido')
    @if(session('mensaje'))
        <div class="alerta alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="container" style="text-align:center;">
        <form action="{{route('clientes.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label><span style="color:red;">*</span>Nombre completo</label>
                    <input type="text" required name="nombre" class="form-control" placeholder="Nombre completo">
                    <label><span style="color:red;">*</span>Negocio (nombre)</label>
                    <input type="text" required name="negocio" class="form-control" placeholder="Nombre del negocio">
                    <label><span style="color:red;">*</span>Tipo de cliente</label>
                    <select name="comision_id" id="comision_id" required class="form-control" style="text-align:center;">
                        <option value="">-- ESCOJE ALGUNA OPCION --</option>
                        @foreach($comi as $c)
                            <option value="{{$c->id}}">{{$c->Tipo_cliente}}: {{$c->descripción}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label><span style="color:red;">*</span>Telefono</label>
                    <input type="number" required name="telefono" class="form-control" placeholder="telefono">
                    <label><span style="color:red;">*</span>Dirección</label>
                    <input type="text" required name="direccion" class="form-control" placeholder="Dirección (casa)">
                    <label><span style="color:red;">*</span>Correo</label>
                    <input type="email" required name="correo" class="form-control" placeholder="correo@gmail.com">
                    <input type="hidden" required name="user_id" value="{{Auth::user()->id}}">
                </div>
            </div><br><br>
            <button type="submit" class="btn btn-success">Agregar Cliente</button>
        </form>
    </div>
@endsection
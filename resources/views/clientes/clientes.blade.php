@extends('layouts.app')

@section('titulo')
Clientes
@endsection

@section('contenido')
<a href="{{route('clientes.create')}}">
    <button type="button" class="btn btn-success btn-lg btn-block">Nuevo cliente</button>
</a>
<br>
    @if(session('mensaje'))
        <div class="alerta alert-danger">
            {{ session('mensaje') }}
        </div>
    @endif
<table class="table table-striped table-dark" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Negocio</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Cliente</th>
            <th scope="col">Registro:</th>
            @if(Auth::user()->rol_id == 1)
                <th scope="col">Registrar Factura</th>
                <th scope="col" colspan="3">Acciones</th>
            @elseif(Auth::user()->rol_id == 2)
                <th scope="col">Registrar Factura</th>
            @endif
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
                <td>{{$item->Comicions->codigo_cliente}}</td>
                <td>{{$item->Users->name}}</td>
                @if(Auth::user()->rol_id == 1)
                    <td>
                        @foreach($factura as $f)
                            @if($f->cliente_id == $item->id)
                                <a href="{{route('ventaa.show', $item->id)}}"><button class="btn btn-success">Ver Factura</button></a>
                                <input type="hidden" value="{{$comparativa = 1}}">
                            @else
                                <input type="hidden" value="{{$comparativa = 0}}">
                            @endif
                        @endforeach
                        @if($comparativa == 0)
                            <a href="{{route('crear.factura', $item->id)}}"><button class="btn btn-info">Registar Factura</button></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('clientes.show', $item->id)}}">
                            <button type="submit" class="btn btn-success">
                                Historial
                            </button>
                        </a>
                    </td>
                    <td><a href="{{route('clientes.edit', $item->id)}}"><button class="btn btn-info">Editar</button></a></td>
                    <td>
                        <form action="{{route('clientes.destroy', $item->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                @elseif(Auth::user()->rol_id == 2)
                    <td><a href=""><button class="btn btn-info">Registar Factura</button></a></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
{{$cliente->links()}}
@endsection

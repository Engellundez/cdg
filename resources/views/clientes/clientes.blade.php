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
                <th scope="col" colspan="3">Acciones</th>
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
                        <a href="{{route('clientes.show', $item)}}">
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
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
{{$cliente->links()}}
@endsection

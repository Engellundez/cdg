@extends('layouts.app')

@section('titulo')
Realizar venta
@endsection

@section('contenido')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    
    @if(session('mensaje'))
        <div class="alerta alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <span style="color: red;">* CAMPOS OBLIGATORIOS</span><br>
    <form action="{{route('venta.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label>Fecha:<span style="color: red;">*</span></label>
                <input type="text" required class="form-control" disabled value="{{date('d/m/y')}}">
                <input type="hidden" name="fecha" value="{{date('y/m/d')}}">
            </div>
            <div class="col">
                <label>Codigo del Producto<span style="color: red;">*</span></label>
                <select name="producto_id" required id="producto_id" class="form-control">
                    <option value="">{{_('-- Escoje alguna opción --')}}</option>
                    @foreach($envasados as $e)
                        <option value="{{$e->id}}">{{$e->codigo_producto}} - {{$e->producto}} - ${{$e->precio}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>Cantidad<span style="color: red;">*</span></label>
                <input type="number" name="cantidad" required min="1" class="form-control" placeholder="Cantidad">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <label>Autoriza<span style="color: red;">*</span></label>
                <select name="autoriza" class="form-control" required id="autoriza">
                    <option value="">-- Quién Autoriza la venta --</option>
                    @foreach($user as $u)
                        @if($u->id != 3)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="user_id" required value="{{Auth::user()->id}}" class="form-control">
            </div>
            <div class="col">
                <label>Cliente<span style="color: red;">*</span></label>
                <select name="cliente_id" required id="cliente" class="form-control">
                    <option value=""> -- ESCOJE UN CLIENTE --</option>
                    @foreach($clientes as $c)
                        <option value="{{$c->id}}">{{$c->nombre}}, {{$c->Comicions->Tipo_cliente}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>Tipo de cliente<span style="color: red;">*</span></label>
                <select name="comision_id" id="" required class="form-control">
                    <option value="">-- SELECIONA UNA OPCION --</option>
                    @foreach($comi as $com)
                        <option value="{{$com->id}}">{{$com->codigo_cliente}} - {{$com->Tipo_cliente}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <label>Politica de precio<span style="color: red;">*</span></label>
                <select name="fpago_id" id="fpago_id" required class="form-control">
                    <option>-- ESCOJE ALGUN METODO DE PAGO --</option>
                    @foreach($fpagos as $f)
                        <option value="{{$f->id}}">{{$f->codigo_venta}} - {{$f->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>CVyFP<span style="color: red;">*</span></label>
                <input type="text" name="CVyFP" required class="form-control" placeholder="CV y FP">
            </div>
            <div class="col">
                <label>OBSERVACIONES</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <input type="hidden" value="{{Auth::user()->id}}" name="autoriza">
                <input type="hidden" name="devoluciones">
                <label>Requiere Factura<span style="color: red;">*</span></label>
                <select class="form-control" name="factura" required id="factura">
                    <option value="">-- ESCOJER UNA OPCION --</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
            <div class="col">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <button class="btn btn-success btn-lg btn-block" type="submit">REALIZAR VENTA</button>
            </div>
            <div class="col">
            </div>
        </div>
    </form>
@endsection

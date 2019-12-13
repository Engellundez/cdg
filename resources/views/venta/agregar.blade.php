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

    @foreach($vencue as $vc)
        <input type="hidden" value="{{$nc = $vc->id +1}}">
    @endforeach
    <span style="color: red;">* CAMPOS OBLIGATORIOS</span><br><br>

    @if(session('menssage'))
        <div class="alerta alert-success">
            {{ session('menssage') }}
        </div>
    @endif

    <form action="{{route('ventaa.store')}}" method="POST">
        @csrf
        <div class="row">
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
        </div><br>
        <div class="row">
            <div class="col">
                <input type="hidden" name="venta_id" value="{{$nc}}">
            </div>
            <div class="col">
                <button class="btn btn-success btn-lg btn-block" type="submit">AGREGAR PRODUCTO</button>
            </div>
            <div class="col">
            </div>
        </div>
    </form><br><br>

    
    @if(session('deletemessage'))
        <div class="alerta alert-danger">
            {{ session('deletemessage') }}
        </div>
    @endif
    <table class="table" style="text-align:center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Productos</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Total</th>
                <th scope="col">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" value="{{$totalfin = 0}}">
            @foreach($ventacuenta as $cuente)
                @if($cuente->venta_id == $nc)
                    <tr>
                        <th scope="row">{{$cuente->cantidad}}</th>
                        <td>{{$cuente->Envasados->producto}}: {{$cuente->Envasados->descripcion}}</td>
                        <td style="color:#32b418;">${{$cuente->Envasados->precio}}</td>
                        <td style="color:#32b418;">${{$tot = $cuente->cantidad * $cuente->Envasados->precio}}</td>
                        <input type="hidden" value="{{$totalfin = $totalfin + ($cuente->cantidad * $cuente->Envasados->precio)}}">
                        <td>
                            <form action="{{route('ventaa.destroy', $cuente->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>


    <br><br>


    <form action="{{route('venta.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col"></div>
            <div class="col" style="color:#32b418; text-align:center;">
                <label>TOTAL DE VENTA</label><input style="color:#32b418; text-align:center;" type="text" disabled class="form-control" value="${{$totalfin}}">
                <input type="hidden" name="total" value="{{$totalfin}}">            
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <label>Fecha:<span style="color: red;">*</span></label>
                <input type="text" required class="form-control" disabled value="{{date('d/m/y')}}">
                <input type="hidden" name="fecha" value="{{date('y/m/d')}}">
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
                <label>Tipo de cliente<span style="color: red;">*</span></label>
                <select name="comision_id" id="" required class="form-control">
                    <option value="">-- SELECIONA UNA OPCION --</option>
                    @foreach($comi as $com)
                        <option value="{{$com->id}}">{{$com->codigo_cliente}} - {{$com->Tipo_cliente}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>Politica de precio<span style="color: red;">*</span></label>
                <select name="fpago_id" id="fpago_id" required class="form-control">
                    <option>-- ESCOJE ALGUN METODO DE PAGO --</option>
                    @foreach($fpagos as $f)
                        <option value="{{$f->id}}">{{$f->codigo_venta}} - {{$f->descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <label>CVyFP<span style="color: red;">*</span></label>
                <input type="text" name="CVyFP" required class="form-control" placeholder="CV y FP">
            </div>
            <div class="col">
                <label>OBSERVACIONES</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = App\Cliente::orderBy('nombre', 'ASC')->paginate(5);
        $factura = App\Facturacion::all();
        return view('clientes.clientes',compact('cliente', 'factura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comi = App\Comicion::all();
        return view('clientes.crear', compact('comi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Cliente::create($request->all());

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = App\Venta::orderBy('id', 'DESC')->where('cliente_id', $id)->paginate(4);
        $total = App\Venta::all()->where('cliente_id', $id);
        $productos = App\VentaCuenta::all();

        return view('clientes.historial', compact('cliente','total','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clie = App\Cliente::findOrFail($id);
        $comi = App\Comicion::all();
        return view('clientes.edit', compact('comi', 'clie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = App\Cliente::findOrFail($id);
        $cliente->nombre = $request->nombre;
        $cliente->negocio = $request->negocio;
        $cliente->comision_id = $request->comision_id;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->correo = $request->correo;
        $cliente->save();

        return back()->with('mensaje', 'Se han actualizado los datos correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = App\Cliente::findOrFail($id);
        $cliente->delete();

        $factura = App\Facturacion::where('cliente_id', $id);
        $factura->delete();

        return back()->with('mensaje', 'El Cliente ha sido ELIMINADO Correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class VenCuenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\VentaCuenta::create($request->all());

        return back()->with('menssage', 'Se ha agregado el producto satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fac = App\Facturacion::where('cliente_id', $id)->firstOrFail();

        return view('clientes.verfactura', compact('fac'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = App\Cliente::findOrFail($id);
        $factura = App\Facturacion::where('cliente_id', $id)->firstOrFail();

        return view('clientes.editfac', compact('cliente', 'factura'));
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
        $val = App\Facturacion::findOrFail($id);
        $val->razon_social = $request->razon_social;
        $val->rfc = $request->rfc;
        $val->domicilio_fiscal = $request->domicilio_fiscal;
        $val->correo = $request->correo;
        $val->telefono = $request->telefono;

        $val->save();

        return back()->with('mensaje', 'Se han actualizado los datos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vencue = App\VentaCuenta::findOrFail($id);
        $vencue->delete();

        return back()->with('deletemessage', 'El producto ha sido ELIMINADO Correctamente');
    }

    public function eliminar($id){
        $fac = App\Facturacion::findOrFail($id);
        $fac->delete();

        return redirect()->route('clientes.index');
    }

    public function crearfac($id){
        $cliente = App\Cliente::findOrFail($id);

        return view('clientes.crearfactura', compact('cliente'));
    }

    public function guardar(Request $request)
    {
        $factura = new App\Facturacion();
        $factura->cliente_id = $request->cliente_id;
        $factura->razon_social = $request->razon_social;
        $factura->rfc = $request->rfc;
        $factura->domicilio_fiscal = $request->domicilio_fiscal;
        $factura->correo = $request->correo;
        $factura->telefono = $request->telefono;
        $factura->save();

        $clien = App\Cliente::findOrFail($request->id_user);
        $clien->factura = $request->factura;
        $clien->save();

        return redirect()->route('clientes.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App;

class VentaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventacuenta = App\VentaCuenta::all();
        $envasados = App\Envasado::all();
        $clientes = App\Cliente::orderBy('nombre', 'ASC')->paginate(30000);
        $fpagos = App\Fpago::all();
        $comi = App\Comicion::all();
        $user = App\User::all();
        $vencue = App\Venta::orderBy('id', 'desc')->take(1)->get();
        return view('venta.agregar', compact('ventacuenta','envasados', 'clientes', 'fpagos', 'comi', 'user', 'vencue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        App\Venta::create($request->all());

        $g = new App\VentaEmpleado();
        $g->user_id = $request->get('user_id');
        $g->save();

        return back()->with('mensaje', 'La venta se a realizado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = App\Venta::findOrFail($id);
        $vc = App\VentaCuenta::all();
        return view('venta.show', compact('venta', 'vc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

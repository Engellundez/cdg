<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $venta = App\Venta::orderBy('id', 'DESC')->paginate(5);
        $vencue = App\VentaCuenta::all();
        return view('home',compact('venta', 'vencue'));
    }
}

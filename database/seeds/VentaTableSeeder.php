<?php

use Illuminate\Database\Seeder;

class VentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas')->insert([
            'fecha' => '2019-12-04',
            'producto_id' => '1',
            'cantidad' => '2',
            'autoriza' => '1',
            'user_id' => '1',
            'cliente_id' => '1',
            'factura' => '0',
            'comision_id' => '1',
            'fpago_id' => '1',
            'CVyFP' => 'no se que sea esto :v',
            'descripcion' => 'descripcion generica',
            'devoluciones' => '',
        ]);

        DB::table('clientes')->insert([
            'nombre' => 'Raul Estrada OFarril',
            'direccion' => 'Aramen 541',
            'telefono' => '4433867825',
            'correo' => 'correo@gmail.com',
            'negocio' => 'Tienda Generica 1',
            'comision_id' => '4'
        ]);

        DB::table('venta_empleados')->insert([
            'user_id' => '1',
        ]);
    }
}

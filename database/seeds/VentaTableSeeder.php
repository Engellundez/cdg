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
            'total' => '2200',
            'autoriza' => '2',
            'user_id' => '3',
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
            'telefono' => '4433867835',
            'correo' => 'correo@gmail.com',
            'negocio' => 'Tienda Generica 1',
            'comision_id' => '4',
            'user_id' => '1',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Angel David Escutia Lundez',
            'direccion' => 'Francisco villa #110',
            'telefono' => '4433867825',
            'correo' => 'blu_mr.conejo@gmail.com',
            'negocio' => 'Vape For life',
            'comision_id' => '1',
            'user_id' => '3',
        ]);

        DB::table('venta_empleados')->insert([
            'user_id' => '3',
        ]);
        DB::table('venta_cuentas')->insert([
            'venta_id' => '1',
            'producto_id' => '4',
            'cantidad' => '2',
        ]);
        DB::table('venta_cuentas')->insert([
            'venta_id' => '1',
            'producto_id' => '2',
            'cantidad' => '5',
        ]);
        DB::table('facturacions')->insert([
            'cliente_id' => '0',
            'razon_social' => '',
            'rfc' => '',
            'domicilio_fiscal' => '',
            'correo' => '',
            'telefono' => '',
        ]);
    }
}
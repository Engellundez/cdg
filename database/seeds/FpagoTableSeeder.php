<?php

use Illuminate\Database\Seeder;

class FpagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Pago1',
            'descripcion' => 'Pago al momento de entrega en efectivo',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Pago2',
            'descripcion' => 'Pago al momento de entrega transferencia',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Pago3',
            'descripcion' => 'Pago al momento de entrega cheque',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Pago4',
            'descripcion' => 'Otro',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cons1',
            'descripcion' => 'Consignación a una semana',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cons2',
            'descripcion' => 'Consignación a dos semanas',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cons3',
            'descripcion' => 'Consignación a tres semanas',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cons4',
            'descripcion' => 'Consignación a un mes',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cons5',
            'descripcion' => 'Consignación indefinida',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cred1',
            'descripcion' => 'Crédito a plazo definido',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cred2',
            'descripcion' => 'Crédito a plazo indefinido',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Prom',
            'descripcion' => 'Promoción',
        ]);
        DB::table('fpagos')->insert([
            'codigo_venta' => 'Cort',
            'descripcion' => 'Cortesía',
        ]);
    }
}

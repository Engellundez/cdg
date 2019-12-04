<?php

use Illuminate\Database\Seeder;

class ComisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comicions')->insert([
            'codigo_cliente' => 'N1',
            'Tipo_cliente' => 'Nuevo',
            'descripción' => 'Cliente nuevo durante primer mes',
            'comision' => '10',
        ]);
        DB::table('comicions')->insert([
            'codigo_cliente' => 'N2',
            'Tipo_cliente' => 'Nuevo mantenido',
            'descripción' => 'Cliente nuevo durante 2do y 3er mes',
            'comision' => '5',
        ]);
        DB::table('comicions')->insert([
            'codigo_cliente' => 'N3',
            'Tipo_cliente' => 'Nuevo en crecimiento',
            'descripción' => 'Cliente nuevo que aumente compra en 20%',
            'comision' => '8',
        ]);
        DB::table('comicions')->insert([
            'codigo_cliente' => 'E1',
            'Tipo_cliente' => 'Existente',
            'descripción' => 'Cliente de 2016 e inicios de 2017 que aumente el volumen de compra',
            'comision' => '3',
        ]);
        DB::table('comicions')->insert([
            'codigo_cliente' => 'C1',
            'Tipo_cliente' => 'Consolidado',
            'descripción' => 'Cliente de 2016 e inicios de 2018',
            'comision' => '5',
        ]);
    }
}

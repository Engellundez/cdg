<?php

use Illuminate\Database\Seeder;

class PrecioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('precios')->insert([
            'codigo_precio' => 'M1',
            'criterio' => 'Menudeo',
            'descripcion' => '1 - 4 botellas',
        ]);
        DB::table('precios')->insert([
            'codigo_precio' => 'M2',
            'criterio' => 'Medio mayoreo',
            'descripcion' => '5 - 12 botellas',
        ]);
        DB::table('precios')->insert([
            'codigo_precio' => 'M3',
            'criterio' => 'Mayoreo',
            'descripcion' => 'Más de 12 botellas',
        ]);
        DB::table('precios')->insert([
            'codigo_precio' => 'E1',
            'criterio' => 'Ferias/Expo/Cata',
            'descripcion' => 'Eventos',
        ]);
        DB::table('precios')->insert([
            'codigo_precio' => 'C1',
            'criterio' => 'Colaborador',
            'descripcion' => 'Colaborador - 20%',
        ]);
    }
}

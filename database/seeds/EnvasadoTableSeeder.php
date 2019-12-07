<?php

use Illuminate\Database\Seeder;

class EnvasadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('envasados')->insert([
            'codigo_producto' => '42B',
            'producto' => 'Ensamble 42°',
            'descripcion' => 'Presentacion 750 ml',
            'precio' => '350',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '45B',
            'producto' => 'Ensamble 45°',
            'descripcion' => 'Presentacion 750 ml',
            'precio' => '400',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '47B',
            'producto' => 'Ensamble 47°',
            'descripcion' => 'Presentacion 750 ml',
            'precio' => '450',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '42M',
            'producto' => 'Ensamble 42°',
            'descripcion' => 'Presentacion 50 ml',
            'precio' => '100',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '45M',
            'producto' => 'Ensamble 45°',
            'descripcion' => 'Presentacion 50 ml',
            'precio' => '130',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '47M',
            'producto' => 'Ensamble 47°',
            'descripcion' => 'Presentacion 50 ml',
            'precio' => '180',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '42G',
            'producto' => 'Ensamble 42°',
            'descripcion' => 'Presentacion 4 lt',
            'precio' => '1000',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '45G',
            'producto' => 'Ensamble 45°',
            'descripcion' => 'Presentacion 4 lt',
            'precio' => '1100',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => '47G',
            'producto' => 'Ensamble 47°',
            'descripcion' => 'Presentacion 4 lt',
            'precio' => '1200',
        ]);
        DB::table('envasados')->insert([
            'codigo_producto' => 'Cab',
            'producto' => 'Caballito',
            'descripcion' => 'Serigrafiado',
            'precio' => '30',
        ]);
    }
}

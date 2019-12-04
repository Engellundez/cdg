<?php

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'codigo_producto' => 'P42',
            'producto' => 'Ensamble 42°',
            'descripcion' => 'Litros para envasar',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'P45',
            'producto' => 'Ensamble 45°',
            'descripcion' => 'Litros para envasar',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'P47',
            'producto' => 'Ensamble 47°',
            'descripcion' => 'Litros para envasar',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'Cab',
            'producto' => 'Caballitos',
            'descripcion' => 'Piezas',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'Bot',
            'producto' => 'Botellas',
            'descripcion' => 'Piezas',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'Cor',
            'producto' => 'Corchos',
            'descripcion' => 'Piezas',
            'precio' => '0',
        ]);
        DB::table('productos')->insert([
            'codigo_producto' => 'Eti',
            'producto' => 'Etiquetas',
            'descripcion' => 'Piezas',
            'precio' => '0',
        ]);
    }
}

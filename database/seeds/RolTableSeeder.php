<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'rol' => 'Administrador',
        ]);
        DB::table('rols')->insert([
            'rol' => 'Supervisor',
        ]);
        DB::table('rols')->insert([
            'rol' => 'Vendedor',
        ]);
    }
}

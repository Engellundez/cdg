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

        DB::table('users')->insert([
            'name' => 'Angel David Escutia Lundez',
            'email' => 'blu_mr.conejo@hotmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$3PXZaNjwitNuXJ0GLg7akO2Gri6Bn138EzOiGKk1jLDuuTLg4b6iq',
            'rol_id' => '1',
        ]);
    }
}

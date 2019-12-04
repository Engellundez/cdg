<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ComisionTableSeeder::class,
            EnvasadoTableSeeder::class,
            FpagoTableSeeder::class,
            PrecioTableSeeder::class,
            ProductoTableSeeder::class,
            RolTableSeeder::class,
            ]
        );
    }
}

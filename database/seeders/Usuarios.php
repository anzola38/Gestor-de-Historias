<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre_completo' => "Usuario de prueba",
            'compania' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456)
        ]);
    }
}

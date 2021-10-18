<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class Companias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compania')->insert([
            'nombre' => 'Fusepong',
            'nit' => '123456789',
            'telefono' => '3103757771',
            'direccion' => 'Bogota DC',
            'correo' => 'Fusepong@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'Facebook',
            'nit' => '12345',
            'telefono' => '3103757772',
            'direccion' => 'EEUU',
            'correo' => 'Facebook@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'Instagram',
            'nit' => '1234456',
            'telefono' => '3103757773',
            'direccion' => 'California',
            'correo' => 'Instagram@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'NetGrind',
            'nit' => '1234567',
            'telefono' => '3103757774',
            'direccion' => 'Bogota DC',
            'correo' => 'NetGrind@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'Zettaflops',
            'nit' => '12345678',
            'telefono' => '3103757775',
            'direccion' => 'Chia - Cundinamarca',
            'correo' => 'Zettaflops@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'Banco de Bogota',
            'nit' => '1234',
            'telefono' => '3103757776',
            'direccion' => 'Bogota DC',
            'correo' => 'bogota@prueba.com']);

            DB::table('compania')->insert([
            'nombre' => 'Enerca',
            'nit' => '123',
            'telefono' => '3103757777',
            'direccion' => 'Chia - Cundinamarca',
            'correo' => 'Enerca@prueba.com']);
    }
}

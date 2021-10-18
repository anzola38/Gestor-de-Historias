<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class Proyectos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos')->insert([ 'titulo' => 'Aquiles', 'id_compania' => 1]);
        DB::table('proyectos')->insert([ 'titulo' => 'Armagedon','id_compania' => 1]);
        DB::table('proyectos')->insert([ 'titulo' => 'Innova','id_compania' => 1]);
        DB::table('proyectos')->insert([ 'titulo' => 'Mantiz','id_compania' => 2]);
        DB::table('proyectos')->insert([ 'titulo' => 'Curva','id_compania' =>2]);
        DB::table('proyectos')->insert([ 'titulo' => 'COE','id_compania' => 2]);
        DB::table('proyectos')->insert([ 'titulo' => 'Manhattan','id_compania' => 3]);
    }
}

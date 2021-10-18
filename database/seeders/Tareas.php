<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class Tareas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tareas')->insert([ 'titulo' => 'Creación del carrito' , 'estado' => 1, 'comentarios' => "Sin comentarios.", 'id_historia' => 1]);

        DB::table('tareas')->insert([ 'titulo' => 'Creación de la interfaz' , 'estado' => 2, 'comentarios' => "Se inicia el desarrollo.", 'id_historia' => 1]);

        DB::table('tareas')->insert([ 'titulo' => 'Aplicación de estilos css' , 'estado' => 3, 'comentarios' => "Se pasa a pruebas.", 'id_historia' => 1]);

        DB::table('tareas')->insert([ 'titulo' => 'Creación de los controladores en Laravel' , 'estado' => 4, 'comentarios' => "Sin comentarios.", 'id_historia' => 1]);

        DB::table('tareas')->insert([ 'titulo' => 'Creación del middleware' , 'estado' => 5, 'comentarios' => "Sin comentarios.", 'id_historia' => 1]);




        DB::table('tareas')->insert([ 'titulo' => 'Aplicacion de animacion' , 'estado' => 4, 'comentarios' => "Se termina el desarrollo.", 'id_historia' => 2]);




        DB::table('tareas')->insert([ 'titulo' => 'Realización de maquetación' , 'estado' => 5, 'comentarios' => "Se cancela la actividad.", 'id_historia' => 3]);




        DB::table('tareas')->insert([ 'titulo' => 'Diseño de la solución' , 'estado' => 4, 'comentarios' => "Se realiza los esquemas del diseño de la solución.", 'id_historia' => 4]);

        DB::table('tareas')->insert([ 'titulo' => 'Desarrollo de la integración con LDAP' , 'estado' => 2, 'comentarios' => "Sin comentarios.", 'id_historia' => 4]);




        DB::table('tareas')->insert([ 'titulo' => 'Realización de maquetación' , 'estado' => 3, 'comentarios' => "Sin comentarios.", 'id_historia' => 5]);

    }
}

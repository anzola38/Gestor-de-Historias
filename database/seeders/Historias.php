<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class Historias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historias')->insert([ 'titulo' => 'Creación del carrito de compras' , 'estado' => 2, 'id_proyectos' => 1, 'descripcion' => 'Se requiere que  crear un carrito de compras para la tienda online.']);

        DB::table('historias')->insert([ 'titulo' => 'Programación de las semillas' , 'estado' => 4, 'id_proyectos' => 1, 'descripcion' => 'Se requiere crear las semillas necesarias para realizar el cargue masivo de la información.']);

        DB::table('historias')->insert([ 'titulo' => 'Se debe catalogar los cambios realizados' , 'estado' => 4, 'id_proyectos' => 1, 'descripcion' => 'Se requiere enviar a producción todos los cambios realizados en el mes.']);

        DB::table('historias')->insert([ 'titulo' => 'Crear una nueva tabla' , 'estado' => 3, 'id_proyectos' => 1, 'descripcion' => 'Se tiene que crear una nueva tabla en base de datos para almacenar la información del carrito de compras.']);

        DB::table('historias')->insert([ 'titulo' => 'Creación sección' , 'estado' => 2, 'id_proyectos' => 1, 'descripcion' => 'Crear la nueva sección encargada de mostrar las compras agregadas al carrito de compras.']);

        DB::table('historias')->insert([ 'titulo' => 'Pasarela de pago' , 'estado' => 4, 'id_proyectos' => 1, 'descripcion' => 'Se debe realizar la integración para programar la pasarela de pagos.']);

        DB::table('historias')->insert([ 'titulo' => 'Eliminación del proceso' , 'estado' => 2, 'id_proyectos' => 2, 'descripcion' => 'Se debe eliminar el proceso de legalización para agilizar los procesos.']);

        DB::table('historias')->insert([ 'titulo' => 'Creación del proceso automatizado' , 'estado' => 2, 'id_proyectos' => 2, 'descripcion' => 'Se debe de enviar una notificación cada hora con los articulos devueltos por el cliente.']);

        DB::table('historias')->insert([ 'titulo' => 'Validación' , 'estado' => 2, 'id_proyectos' => 2, 'descripcion' => 'Se requiere crear una validación de correo electronico a la hora de agregar articulos al carrito.']);

        DB::table('historias')->insert([ 'titulo' => 'Creación de login' , 'estado' => 2, 'id_proyectos' => 3, 'descripcion' => 'Se debe crear el login para integrarlo con la pasarale de pagos.']);
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdministrarOpciones extends Controller
{
    /**
     * Este constructor esta encargado de validar que este el usuario logueado
     */
    public function __construct()
    {
        $this->middleware('ControlAcceso');
    }
    /**
     * Este metodo carga la vista para administrar las proyectos y compañias
     */
    public function cargarVista(){
        $companias = DB::table('compania')->select('*')->get();
        $proyectos = DB::table('proyectos')->select('*')->get();
        return view('Opciones',compact('companias','proyectos'));
    }

    /**
     * Este metodo guarda un proyecto
     */
    public function guardarProyecto(Request $request){
        DB::table('proyectos')->insert([
            'titulo' => $request->input('nombreProyecto'),
            'id_compania' => $request->input('compania')]);

        return redirect('/Inicio/AdministrarOpciones')->with('status_exito', "Éxito, el proyecto se guardo correctamente.");
    }

    /**
     * Este metodo guarda una compañia
     */
    public function guardarCompania(Request $request){

        if(DB::table('compania')->where('nit', $request->input('nit'))->exists()){
            return redirect('/Inicio/AdministrarOpciones')->with('status_error', "Error, el N° de NIT ingresado ya se encuentra registrado.");
        }

        DB::table('compania')->insert([
            'nombre' => $request->input('nombreCompania'),
            'nit' => $request->input('nit'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccionCompania'),
            'correo' => $request->input('correoCompania'),]);

        return redirect('/Inicio/AdministrarOpciones')->with('status_exito', "Éxito, la compañia se guardo correctamente.");
    }
}

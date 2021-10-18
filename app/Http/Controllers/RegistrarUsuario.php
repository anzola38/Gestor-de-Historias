<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class RegistrarUsuario extends Controller
{
    /**
     * Este constructor esta encargado de validar que este el usuario no este logueado
     */
    public function __construct()
    {
        $this->middleware('ControlInicioSesion');
    }
    /**
     * Este metodo tiene la función de cargar un la vista para registrar un usuario
     */
    public function cargarVista(){
        $companias = DB::table('compania')->select('*')->get();
        return view('Registrar',compact('companias'));
    }

    /**
     * Este metodo tiene la función de guardar la infomación del usuario
     */
    public function guardarUsuario(Request $request){

        if($request->input('contrasenia1') != $request->input('contrasenia2')){
            return redirect('/Registrar')->with('status_error', "Error, las contraseñas no coinciden.");
        }

        if(DB::table('usuarios')->where('email', $request->input('correo'))->exists()){
            return redirect('/Registrar')->with('status_error', "Error, el correo ingresado ya se encuentra registrado.");
        }

        DB::table('usuarios')->insert([
            'nombre_completo' => $request->input('nombreCompleto'),
            'compania' => $request->input('compania'),
            'email' => $request->input('correo'),
            'password' => bcrypt($request->input('contrasenia1'))
        ]);

        return redirect('/Sesion');
    }
}

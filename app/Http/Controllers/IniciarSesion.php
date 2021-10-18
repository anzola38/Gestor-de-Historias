<?php

namespace App\Http\Controllers;
use DB;
use Usuario;
use Illuminate\Http\Request;

class IniciarSesion extends Controller
{
    /**
     * Este constructor esta encargado de validar que este el usuario no este logueado
     */
    public function __construct()
    {
        $this->middleware('ControlInicioSesion', ['except' => ['cerrarSesion']]);
    }
    /**
     * Este metodo tiene la función de cargar la vista de login
     */
    public function cargarVista(){
        return view('Ingresar');
    }

    /**
     * Este metodo tiene la función de iniciar sessión
     */
    public function iniciarSession(Request $request){

        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return redirect('/Sesion')->with('status_error', "Error, la contraseña o correo ingresado no es correcto.");
        }

        $usuario = DB::table('usuarios')->select('compania')->where('email', '=', $request->input('email'))->first();
        $request->session()->put('token',$token);
        $request->session()->put('compania',$usuario->compania);
        return redirect('/');
    }

    /**
     * Este metodo tiene la función de cerrar sessión
     */
    public function cerrarSesion(Request $request){
        $request->session()->put('token',null);
        return redirect('/Sesion');
    }
}

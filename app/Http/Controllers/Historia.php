<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Historia extends Controller
{
    /**
     * Este constructor esta encargado de validar que este el usuario logueado
     */
    public function __construct()
    {
        $this->middleware('ControlAcceso');
    }
    /**
     * Este metodo tiene la función de guardar una historia
     */
    public function guardarHistoria(Request $request){

        DB::table('historias')->insert([
            'titulo' => $request->input('tituloHistoria'),
            'estado' => 1,
            'id_proyectos' => $request->input('proyecto'),
            'descripcion' => $request->input('descripcionHistoria')
        ]);

        return redirect('/')->with('status_exito', "Éxito, se a guardado la historia.");
    }

    /**
     * Este metodo tiene la función de cargar todas las historias
     */
    public function cargarVista(){
        $companias = DB::table('compania')->select('*')->get();
        $proyectos = DB::table('proyectos')->select('*')->where('id_compania', '=', session('compania'))->get();
        return view('Proyectos', compact('proyectos','companias'));
    }

    public function cargarVistaHistoria($idProyecto){
        $proyectos = DB::table('proyectos')->select('*')->where('id_compania', '=', session('compania'))->get();
        $historias = DB::table('historias')->select('titulo', 'estado','id')->where('id_proyectos', '=', $idProyecto)->get();
        return view('Historias', compact('historias','proyectos'));
    }

    /**
     * Este metodo esta encargado de cargar los detalles de la historia
     */
    public function detallesHistoria($id){
        $informacionHistoria = DB::table('historias')->select('*')->where('id', '=', $id)->first();
        $proyectos = DB::table('proyectos')->select('*')->get();
        $tareas = DB::table('tareas')->select('*')->where('id_historia', '=', $id)->get();
        return view('DetallesHistoria',compact('informacionHistoria','proyectos','tareas'));
    }

    /**
     * Este metodo tiene la función de guardar la información de la tarea
     */
    public function crearTarea(Request $request){

        $Historia = DB::table('historias')->select('*')->where('id', '=',$request->input('nHistoria'))->first();

        if($Historia->estado == 4){
            return redirect('/Inicio/DetalleHistoria/'.$request->input('nHistoria'))->with('status_error', "Error, no se puede crear la tarea ya que la historia se encuentra terminada.");
        }

        DB::table('tareas')->insert([
            'titulo' => $request->input('tituloTarea'),
            'estado' => 1,
            'comentarios' => $request->input('comentarioTarea'),
            'id_historia' => $request->input('nHistoria')
        ]);

        return redirect('/Inicio/DetalleHistoria/'.$request->input('nHistoria'))->with('status_exito', "Éxito, se a guardado la Tarea.");
    }

    /**
     * Este metodo tiene la función de avanzar una tarea
     */
    public function avanzarTarea($idTarea){
        $tarea = DB::table('tareas')->select('estado','id_historia')->where('id', '=', $idTarea)->first();
        if($tarea->estado+1 <= 4){
            DB::table('tareas')->where('id', $idTarea)->update(['estado' => $tarea->estado+1]);
            return redirect('/Inicio/DetalleHistoria/'.$tarea->id_historia)->with('status_exito', "Éxito, se avanzo la tarea.");
        }else{
            return redirect('/Inicio/DetalleHistoria/'.$tarea->id_historia)->with('status_error', "Error, no se puede avanzar la tarea ya que se encuentra terminada.");
        }
    }

    /**
     * Este metodo tiene la función de cancelar una tarea
     */
    public function cancelarTarea($idTarea){
        $tarea = DB::table('tareas')->select('estado','id_historia')->where('id', '=', $idTarea)->first();
        if($tarea->estado !=4 && $tarea->estado !=5){
            DB::table('tareas')->where('id', $idTarea)->update(['estado' => 5]);
            return redirect('/Inicio/DetalleHistoria/'.$tarea->id_historia)->with('status_exito', "Éxito, se cancelo la tarea.");
        }else{
            return redirect('/Inicio/DetalleHistoria/'.$tarea->id_historia)->with('status_error', "Error, no se puede cancelar la tarea ya que se encuentra terminada o cancelada.");
        }
    }

    /**
     * Este metodo tiene la función de avanzar la historia
     */
    public function avanzarHistoria(Request $request){

        if(!DB::table('tareas')->where('id_historia', $request->input('idHistoria'))->exists()){
            return redirect('/Inicio/DetalleHistoria/'.$request->input('idHistoria'))->with('status_error', "Error, no se puede avanzar la tarea ya que no se encuentra ninguna actividad creada.");
        }

        $Historia = DB::table('historias')->select('*')->where('id', '=', $request->input('idHistoria'))->first();

        if($Historia->estado + 1 == 3 && DB::table('tareas')->where('id_historia', $request->input('idHistoria'))->whereIn('estado', [1, 2, 3])->exists()){
            return redirect('/Inicio/DetalleHistoria/'.$request->input('idHistoria'))->with('status_error', "Error, la historia no puede ser pasada a pruebas ya que faltan tareas por terminar.");
        }

        if($Historia->estado + 1 == 4 && DB::table('tareas')->where('id_historia', $request->input('idHistoria'))->whereIn('estado', [1, 2, 3])->exists()){
            return redirect('/Inicio/DetalleHistoria/'.$request->input('idHistoria'))->with('status_error', "Error, la historia no puede ser pasada a terminado ya que faltan tareas por terminar.");
        }

        if($Historia->estado == 4){
            return redirect('/Inicio/DetalleHistoria/'.$request->input('idHistoria'))->with('status_error', "Error, la historia no puede ser avanzada ya que se encuentra terminada.");
        }

        DB::table('historias')->where('id', $request->input('idHistoria'))->update(['estado' => $Historia->estado +1]);

        return redirect('/Inicio/DetalleHistoria/'.$request->input('idHistoria'))->with('status_exito', "Éxito, se avanzo la historia.");
    }

    /**
     * Este metodo tiene la función de modificar la tarea
     */
    public function modificarTarea(Request $request){
        DB::table('tareas')->where('id', $request->input('idTareaModificacion'))->update(['titulo' => $request->input('tituloTarea'),'comentarios' => $request->input('comentarioTarea')]);
        $tarea = DB::table('tareas')->select('id_historia')->where('id', $request->input('idTareaModificacion'))->first();
        return redirect('/Inicio/DetalleHistoria/'.$tarea->id_historia)->with('status_exito', "Éxito, se modifico la tarea.");
    }

}

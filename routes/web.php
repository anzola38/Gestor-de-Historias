<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Historia;
use App\Http\Controllers\RegistrarUsuario;
use App\Http\Controllers\IniciarSesion;
use App\Http\Controllers\AdministrarOpciones;

Route::get('/', [Historia::class, 'cargarVista']);

/**
 * Este ruta esta encargada de mostrar la vista para registrar un usuario
 */
Route::get('/Registrar', [RegistrarUsuario::class, 'cargarVista']);
/**
 * Esta ruta esta encargada de enviar la información del usuarios para ser guardada
 */
Route::post('/Registrar/GuardarInfomacion', [RegistrarUsuario::class, 'guardarUsuario']);



/**
 * Este ruta esta encargada de mostrar la vista para ingresar al sistema
 */
Route::get('/Sesion', [IniciarSesion::class, 'cargarVista']);
/**
 * Esta ruta esta encargada de enviar la información del usuarios para ser logueado
 */
Route::post('/Sesion/Iniciar', [IniciarSesion::class, 'iniciarSession']);
/**
 * Esta ruta esta encargada de enviar la información del usuarios para cerrar la sesión
 */
Route::post('/Inicio/CerrarSesion', [IniciarSesion::class, 'cerrarSesion']);



/**
 * Este ruta esta encargada de mostrar la vista de los proyectos
 */
Route::get('/Inicio/AdministrarOpciones', [AdministrarOpciones::class, 'cargarVista']);
/**
 * Esta ruta esta encargada de enviar la información del proyecto para posteriormente ser guardada
 */
Route::post('/Inicio/AdministrarOpciones/GuardarProyecto', [AdministrarOpciones::class, 'guardarProyecto']);
/**
 * Esta ruta esta encargada de enviar la información del proyecto para posteriormente ser guardada
 */
Route::post('/Inicio/AdministrarOpciones/GuardarCompania', [AdministrarOpciones::class, 'guardarCompania']);



/**
 * Esta ruta esta encargada de enviar la información de la historia para ser guardada
 */
Route::post('/Inicio/GuardarHistoria', [Historia::class, 'guardarHistoria']);
/**
 * Este ruta esta encargada de mostrar los detalles de la historia
 */
Route::get('/Inicio/DetalleHistoria/{id}', [Historia::class, 'detallesHistoria']);
/**
 * Este ruta esta encargada de mostrar los detalles de la historia
 */
Route::get('/Inicio/VerHistorias/{idProyecto}', [Historia::class, 'cargarVistaHistoria']);
/**
 * Esta ruta esta encargada de enviar la información de la historia para avanzarla de estado
 */
Route::post('/Inicio/DetalleHistoria/AvanzarHistoria', [Historia::class, 'avanzarHistoria']);
/**
 * Esta ruta esta encargada de enviar la información de la tarea para ser almacenada
 */
Route::post('/Inicio/DetalleHistoria/CrearTarea', [Historia::class, 'crearTarea']);
/**
 * Este ruta esta encargada de avanzar una tarea
 */
Route::get('/Inicio/DetalleHistoria/AvanzarTarea/{idTarea}', [Historia::class, 'avanzarTarea']);
/**
 * Este ruta esta encargada de cancelar una tarea
 */
Route::get('/Inicio/DetalleHistoria/CancelarTarea/{idTarea}', [Historia::class, 'cancelarTarea']);
/**
 * Esta ruta esta encargada de enviar la información de la tarea para ser almacenada
 */
Route::post('/Inicio/DetalleHistoria/ModificarTarea', [Historia::class, 'modificarTarea']);

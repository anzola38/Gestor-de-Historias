<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panel de Control</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/documento/documento.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/opciones.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/agregar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/registrar_historia.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/historias.css') }}" rel="stylesheet">
        <link href="{{ asset('css/detalle_historia/informacion_historia.css') }}" rel="stylesheet">
        <link href="{{ asset('css/administrar/tabla.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @if (session('status_error'))
            <div class="error">
                {{ session('status_error') }}
            </div>
        @endif

        @if (session('status_exito'))
            <div class="exito">
                {{ session('status_exito') }}
            </div>
        @endif
        <div id="contenedor-ventana">
        </div>
            <template id="template-modal-Tarea_modificar">
                <div class="contenedor-modal">
                    <div class="div-modal" id="div-modal">
                        <div class="contenedor-formulario">
                        <form id="formulario-modificar-tarea" action="/Inicio/DetalleHistoria/ModificarTarea" method="POST">
                            {{ csrf_field() }}
                            <div class="contenedor-campo-formulario">
                                <input type="text" class="campo-formulario" id="tituloTarea" name="tituloTarea" placeholder="Titulo" required>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <textarea  type="text" class="campo-formulario" id="comentarioTarea"rows="50" cols="30"  name="comentarioTarea" placeholder="Comentarios" required></textarea>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input id="modificarTarea" type="submit" class="boton-formulario" value="Modificar Tarea">
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input id="cerrarVentana" type="button" class="boton-formulario" value="Cerrar Ventana">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </template>
            <template id="template-modal-Tarea">
                <div class="contenedor-modal">
                    <div class="div-modal" id="div-modal">
                        <div class="contenedor-formulario">
                        <form id="formulario-modificar-tarea" action="/Inicio/DetalleHistoria/CrearTarea" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" id="nHistoria" name="nHistoria" value="{{$informacionHistoria->id}}">
                            <br>
                            <div class="contenedor-campo-formulario">
                                <input type="text" class="campo-formulario" id="tituloTarea" name="tituloTarea" placeholder="Titulo" required>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <textarea  type="text" class="campo-formulario" id="comentarioTarea"rows="50" cols="30"  name="comentarioTarea" placeholder="Comentarios" required></textarea>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input id="crearTarea" type="submit" class="boton-formulario" value="Crear Tarea">
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input id="cerrarVentana" type="button" class="boton-formulario" value="Cerrar Ventana">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </template>
            <div class="contenedor-panel-control" id="contenedor-panel-control">
                <div class="contenedor-opciones">
                    <div class="contenedor-campo-formulario" id="pimera-opcion">
                        <a href="{{ url('/Inicio/AdministrarOpciones') }}"><button id="administrarOpciones" class="administrar-opcion" >Administrar Opciones</button>
                        </a>
                    </div>
                    <div class="contenedor-campo-formulario" id="segunda-opcion">
                        <a href="{{ url('/') }}"><button id="inicio" class="administrar-opcion" >Inicio</button>
                        </a>
                    </div>
                    <div class="contenedor-campo-formulario" id="cerrar-session">
                        <form action="/Inicio/CerrarSesion" method="POST">
                            {{ csrf_field() }}
                            <div class="contenedor-campo-formulario">
                                <input id="cerrarSession" type="submit"  class="administrar-opcion" value="Salir del Sistema">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="contenedor-informacion">
                    <div class="encabezado">
                        <div class="contenedor-agregar">
                            <input id="agregarTarea" type="button" class="agregar" value="➕">
                        </div>
                    </div>
                    <div class="contenedor-informacion-historia">
                        <div class="informacion-historia">
                            <div class="contenedor-campo-formulario">
                                <span class="etiqueta-informacion-historia">N° de la Historia</span>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input type="text" class="campo-formulario" id="numeroHistoria" name="numeroHistoria" value="{{$informacionHistoria->id}}" readonly="readonly">
                            </div>
                            <div class="contenedor-campo-formulario">
                                <span class="etiqueta-informacion-historia">Titulo</span>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <input type="text" class="campo-formulario" id="tituloHistoria" name="tituloHistoria" value="{{$informacionHistoria->titulo}}" readonly="readonly">
                            </div>
                            <div class="contenedor-campo-formulario">
                                <span class="etiqueta-informacion-historia">Proyecto</span>
                            </div>
                            <div class="contenedor-campo-formulario">
                                @foreach($proyectos as $apuntador)
                                    @if($apuntador->id == $informacionHistoria->id_proyectos)
                                        <input type="text" class="campo-formulario" id="proyecto" name="proyecto" value="{{$apuntador->titulo}}" readonly="readonly">
                                    @endif
                                @endforeach
                            </div>
                            <div class="contenedor-campo-formulario">
                                <span class="etiqueta-informacion-historia">Descripción</span>
                            </div>
                            <div class="contenedor-campo-formulario">
                                <textarea  type="text" class="campo-formulario" id="descripcionHistoria" rows="50" cols="30" name="descripcionHistoria" readonly="readonly">{{$informacionHistoria->descripcion}}</textarea>
                            </div>
                            <div class="contenedor-campo-formulario">
                                @if($informacionHistoria->estado == 1)
                                    <spam id="estado" class="creada">Creada</spam>
                                @else
                                    @if($informacionHistoria->estado == 2)
                                        <spam id="estado" class="desarrollo">Desarrollo</spam>
                                    @else
                                        @if($informacionHistoria->estado == 3)
                                            <spam id="estado" class="pruebas">Pruebas</spam>
                                        @else
                                            @if($informacionHistoria->estado == 4)
                                                <spam id="estado" class="terminada">Terminada</spam>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <div class="contenedor-campo-formulario">
                                <form action="/Inicio/DetalleHistoria/AvanzarHistoria" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" id="idHistoria" name="idHistoria" value="{{$informacionHistoria->id}}">
                                <div class="contenedor-campo-formulario">
                                    <input id="avanzarHistoria" type="submit"  class="avanzar-historia" value="Avanzar">
                                </div>
                        </form>
                            </div>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Titulo de la Tarea</th>
                                <th>Comentarios</th>
                                <th>Estado</th>
                                <th>Avanzar</th>
                                <th>Modificar</th>
                                <th>Cancelar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $apuntador )
                            <tr>
                                <td>{{$apuntador->titulo}}</td>
                                <td>{{$apuntador->comentarios}}</td>
                                @if($apuntador->estado == 1)
                                    <td id="estado" class="creada">Creada</td>
                                @else
                                    @if($apuntador->estado == 2)
                                        <td id="estado" class="desarrollo">Desarrollo</td>
                                    @else
                                        @if($apuntador->estado == 3)
                                            <td id="estado" class="pruebas">Pruebas</td>
                                        @else
                                            @if($apuntador->estado == 4)
                                                <td id="estado" class="terminada">Terminada</td>
                                            @else
                                                @if($apuntador->estado == 5)
                                                    <td id="estado" class="cancelada">Cancelada</td>
                                                @else
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                @if($apuntador->estado < 4)
                                    <td class="contenedor-avanzar-tarea"><a class="titulo-avanzar-tarea"  href="{{ url('/Inicio/DetalleHistoria/AvanzarTarea/'.$apuntador->id.'/') }}" >Avanzar</a></td>
                                @else
                                    <td>Terminada</td>
                                @endif

                                @if($apuntador->estado != 4 && $apuntador->estado != 5)
                                    <td class="modificarTarea"><a id="modificarTarea{{$apuntador->id}}" class="modificarTarea" href="#"  value="{{$apuntador->id}}">Modificar</a></td>
                                @else
                                    <td>Terminada</td>
                                @endif

                                @if($apuntador->estado != 4 && $apuntador->estado != 5)
                                    <td class="contenedor-cancelar-tarea"><a class="titulo-cancelar-tarea"  href="{{ url('/Inicio/DetalleHistoria/CancelarTarea/'.$apuntador->id.'/') }}" >Cancelar</a></td>
                                @else
                                    <td>Terminada</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <script src="{{ asset('js/manejador_eventos.js') }}" type="module"></script>
        <script src="{{ asset('js/controlador_modal.js') }}" type="module"></script>
    </body>
</html>

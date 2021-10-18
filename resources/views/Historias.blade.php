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
        <template id="template-modal-proyecto">
            <div class="contenedor-modal">
                <div class="div-modal">
                    <div class="contenedor-formulario">
                    <form id="formulario-modificar" action="/Session/PanelControl/Clientes/ActualizarCliente" method="POST">
                        {{ csrf_field() }}
                        <br>
                        <div class="contenedor-campo-formulario">
                            <input type="text" class="campo-formulario" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre Completo" required>
                        </div>
                        <div class="contenedor-campo-formulario">
                            <input id="registrarCliente" type="submit" class="boton-formulario" value="Guardar">
                        </div>
                        <div class="contenedor-campo-formulario">
                            <input id="cerrarVentana" type="button" class="boton-formulario" value="Cerrar Ventana">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </template>
        <template id="template-modal-historia">
            <div class="contenedor-modal">
                <div class="div-modal" id="div-modal">
                    <div class="contenedor-formulario">
                    <form action="/Inicio/GuardarHistoria" method="POST">
                        {{ csrf_field() }}
                        <br>
                        <div class="contenedor-campo-formulario">
                            <input type="text" class="campo-formulario" id="tituloHistoria" name="tituloHistoria" placeholder="Titulo" required>
                        </div>
                        <div class="contenedor-campo-formulario">
                            <select id="id_proyecto" class="campo-formulario" name="proyecto" required>
                                @foreach($proyectos as $apuntador)
                                    <option value="{{$apuntador->id}}">{{$apuntador->titulo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contenedor-campo-formulario">
                            <textarea  type="text" class="campo-formulario" id="descripcionHistoria" rows="50" cols="30" name="descripcionHistoria" placeholder="Descripción breve de la historia" required></textarea>
                        </div>
                        <div class="contenedor-campo-formulario">
                            <input id="crearHistoria" type="submit" class="boton-formulario" value="Crear Historia">
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
                            <input id="agregarHistoria" type="button" class="agregar" value="➕">
                        </div>
                    </div>
                    <div class="contenedor-historias">
                        @foreach ($historias as $apuntador)
                            <a href="{{ url('/Inicio/DetalleHistoria/'.$apuntador->id.'/') }}">
                                @if($apuntador->estado == 1)
                                    <div class="historia creada">
                                        <p class="stiker-titulo-historia">{{$apuntador->titulo}}</p>
                                    </div>
                                @else
                                    @if($apuntador->estado == 2)
                                        <div class="historia desarrollo">
                                            <p class="stiker-titulo-historia">{{$apuntador->titulo}}</p>
                                        </div>
                                    @else
                                        @if($apuntador->estado == 3)
                                            <div class="historia pruebas">
                                               <p class="stiker-titulo-historia">{{$apuntador->titulo}}</p>
                                            </div>
                                        @else
                                            <div class="historia terminada">
                                                <p class="stiker-titulo-historia">{{$apuntador->titulo}}</p>
                                            </div>
                                        @endif
                                    @endif

                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        <script src="{{ asset('js/manejador_eventos.js') }}" type="module"></script>
        <script src="{{ asset('js/controlador_modal.js') }}" type="module"></script>
    </body>
</html>

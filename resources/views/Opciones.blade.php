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
        <link href="{{ asset('css/administrar/administrar_compania.css') }}" rel="stylesheet">
        <link href="{{ asset('css/administrar/administrar_proyecto.css') }}" rel="stylesheet">
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
                <div class="contenedor-informacion" id="contenedor-administrar">
                    <div class="contenedor-informacion-proyecto">
                        <div class="contenedor-formulario">
                            <form class="formulario" id="formulario-registrar-proyecto" action="/Inicio/AdministrarOpciones/GuardarProyecto" method="POST">
                                {{ csrf_field() }}
                                <h3 class="titulo-formulario">Registrar Proyecto</h3>
                                <div class="contenedor-campo-formulario">
                                    <input type="text" class="campo-formulario" id="nombreProyecto" name="nombreProyecto" placeholder="Nombre del Proyecto" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <select id="id_compania" class="campo-formulario" name="compania" required>
                                        @foreach($companias as $apuntador)
                                            <option value="{{$apuntador->id}}">{{$apuntador->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input id="registrarProyecto" type="submit" class="boton-formulario" value="Guardar">
                                </div>
                            </form>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th># del Proyecto</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Compañia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $apuntador )
                                <tr>
                                    <td>{{$apuntador->id}}</td>
                                    <td>{{$apuntador->titulo}}</td>
                                    @foreach($companias as $apuntador_aux)
                                        @if($apuntador_aux->id == $apuntador->id_compania )
                                            <td>{{$apuntador_aux->nombre}}</td>
                                        @else
                                        @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="contenedor-informacion-compania">
                        <div class="contenedor-formulario">
                            <form class="formulario" id="formulario-registrar-compania" action="/Inicio/AdministrarOpciones/GuardarCompania" method="POST">
                                {{ csrf_field() }}
                                <h3 class="titulo-formulario">Registrar Compañia</h3>
                                <div class="contenedor-campo-formulario">
                                    <input type="text" class="campo-formulario" id="nombreCompania" name="nombreCompania" placeholder="Nombre de la Compañia" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input type="number" class="campo-formulario" id="nit" name="nit" placeholder="N° de NIT" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input type="number" class="campo-formulario" id="telefono" name="telefono" placeholder="N° de Telefono" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input type="text" class="campo-formulario" id="direccionCompania" name="direccionCompania" placeholder="Dirección" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input type="email" class="campo-formulario" id="correoCompania" name="correoCompania" placeholder="Correo Electronico" required>
                                </div>
                                <div class="contenedor-campo-formulario">
                                    <input id="registrarCompania" type="submit" class="boton-formulario" value="Guardar">
                                </div>
                            </form>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>NIT</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companias as $apuntador )
                                <tr>
                                    <td>{{$apuntador->nombre}}</td>
                                    <td>{{$apuntador->nit}}</td>
                                    <td>{{$apuntador->telefono}}</td>
                                    <td>{{$apuntador->direccion}}</td>
                                    <td>{{$apuntador->correo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <script src="{{ asset('js/manejador_eventos.js') }}" type="module"></script>
    </body>
</html>

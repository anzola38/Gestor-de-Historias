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
                <div class="contenedor-informacion">
                    <table>
                            <thead>
                                <tr>
                                    <th>N° del Proyecto</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Compañia</th>
                                    <th>Historias</th>
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
                                    <td class="irHistorias"><a class="titulo-irHistoria" href="{{ url('/Inicio/VerHistorias/'.$apuntador->id.'/') }}" >Ver Historias</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
    </body>
</html>

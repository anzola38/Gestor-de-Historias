<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrar</title>
        <link href="{{ asset('css/documento/documento.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/registrar_historia.css') }}" rel="stylesheet">
        <link href="{{ asset('css/registrar/registrar_usuario.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @if (session('status_error'))
            <div class="error">
                {{ session('status_error') }}
            </div>
        @endif
            <div class="contenedor-formulario" id="contenedor-registrar_usuario">
                <form class="formulario" id="formulario-registrar-usuario" action="/Registrar/GuardarInfomacion" method="POST">
                    {{ csrf_field() }}
                    <h3 class="titulo-formulario" id="titulo-formulario-registrar-usuario">Registrar Información</h3>
                    <div class="contenedor-campo-formulario">
                        <input type="text" class="campo-formulario" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre Completo" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input type="email" class="campo-formulario" id="correo" name="correo" placeholder="Email" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <select id="id_compania" class="campo-formulario" name="compania" required>
                            @foreach($companias as $apuntador)
                                <option value="{{$apuntador->id}}">{{$apuntador->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input type="password" class="campo-formulario"  name="contrasenia1" id="contrasenia1" placeholder="Contraseña" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input type="password" class="campo-formulario" name="contrasenia2" id="contrasenia2" placeholder="Confirmar Contraseña" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input id="registrar" type="submit" class="boton-formulario" value="Registrar">
                    </div>
                    <div class="contenedor-campo-formulario">
                        <a href="{{ url('/Sesion') }}" class="ya-tengo-cuenta">Ya tengo cuenta</a>
                    </div>
                </form>
            </div>
        <script src="{{ asset('js/manejador_eventos.js') }}" type="module"></script>
    </body>
</html>

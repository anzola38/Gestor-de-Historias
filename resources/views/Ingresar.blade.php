<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar Sesión</title>
        <link href="{{ asset('css/documento/documento.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panel_control/registrar_historia.css') }}" rel="stylesheet">
        <link href="{{ asset('css/registrar/registrar_usuario.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ingresar/ingresar.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @if (session('status_error'))
            <div class="error">
                {{ session('status_error') }}
            </div>
        @endif
            <div class="contenedor-formulario">
                <form class="formulario-login" id="formulario-ingresar" action="/Sesion/Iniciar" method="POST">
                    {{ csrf_field() }}
                    <h3 class="titulo-formulario">Ingresar al Sistema</h3>
                    <div class="contenedor-campo-formulario">
                        <input type="email" class="campo-formulario" id="correo" name="email" placeholder="Email" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input type="password" class="campo-formulario" id="contrasenia" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="contenedor-campo-formulario">
                        <input id="ingresar" type="submit" class="boton-formulario" value="Ingresar">
                    </div>
                    <div class="contenedor-campo-formulario">
                        <a href="{{ url('/Registrar') }}" class="crear-cuenta">No Tengo Cuenta</a>
                    </div>
                </form>
            </div>
        <script src="{{ asset('js/manejador_eventos.js') }}" type="module"></script>
    </body>
</html>

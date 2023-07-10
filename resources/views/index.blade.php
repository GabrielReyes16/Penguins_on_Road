<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles-login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,300&display=swap" rel="stylesheet">
    <title>Inicia sesión</title>
</head>
<body>
    <div class="fondo-imagen">
        <header>
            <a href="#"><img class="logo-proyecto" src="{{ asset('img/logo-proyecto-blanco.png') }}" alt=""></a>
            <div>
                <h1>Hola, Bienvenido!</h1>
            </div>
        </header>

        <div class="cuerpo">
            <div class="loginBox">
                <div class="fondo-titulo">
                    <h1 class="titulo">Penguins on Road</h1>
                </div>
                <div class="instrucciones">
                    <label>Bienvenido al app web de gestión de buses de Tecsup Penguins on Road! Ingresa tus datos:</label>
                </div>
                <x-auth-session-status :status="session('status')" />
                <x-auth-session-status :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="shadowBox">
                        <x-input-error :messages="$errors->get('email')" class="textInput"  />
                        <x-input-error :messages="$errors->get('password')" />
                        <!-- Email Address -->
                        <div class="inputLine1">
                            <x-input-label for="email" :value="__('Email')" class="textInput" />
                            <x-text-input class="input" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                                <!-- Password -->
                        <div class="inputLine2">
                            <x-input-label for="password" :value="__('Contraseña')" class="textInput" />
                            <x-text-input class="input" id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                        </div>

                        <div class="btn">
                            <a href="usuario-pasajero/home">
                                <button class="btn-in">Ingresar</button>
                            </a>
                        </div>
                        <div class="forgot">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                               <label class="text-forgot"> {{ __('Olvidaste tu contraseña?') }} </label>
                            </a>
                        @endif
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <img class="logo-tecsup" src="{{ asset ('img/logotipo-TECSUP-blanco.png') }}">
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
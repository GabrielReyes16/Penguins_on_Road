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
    <title>LOG IN</title>
</head>
<body>
    <div class="fondo-imagen">
        <header>
            <a href="index.html"><img class="logo-proyecto" src="{{ asset('img/logo-proyecto-blanco.png') }}" alt=""></a>
            <div>
                <h1>Hola, Bienvenido!</h1>
            </div>
        </header>

        <div class="cuerpo">
            <div class="loginBox">
                <div class="fondo-titulo">
                    <h1 class="titulo">Tecsup BUS</h1>
                </div>
                <div class="instrucciones">
                    <label>Bienvenido a la página de Tecsup Bus! Ingresa tus datos:</label>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="shadowBox">
                    <!-- Email Address -->
                    <div class="inputLine1">
                        <x-input-label for="email" :value="__('Usuario')" class="textInput" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                            <!-- Password -->
                    <div class="inputLine2">
                        <x-input-label for="password" :value="__('Contraseña')" class="textInput" />
                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="btn">
                            <x-primary-button class="btn-in">{{ __('Log in') }} </x-primary-button>
                        </a>
                    </div>
                    <div class="forgot">
                        <a href="#">
                            <label class="text-forgot">¿Olvidaste tu contraseña?</label>
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
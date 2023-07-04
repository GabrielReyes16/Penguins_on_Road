<header>
    <div class="logos">
        <img src="{{ asset ('img/logo-proyecto-blanco.png') }}">
        <img src="{{ asset ('img/logotipo-TECSUP-blanco.png') }}">
    </div>
    <div class="menu-bar">
        <li class="options active">
            <a href="/home" class="box-icon-left">
                <span class="icons">
                    <ion-icon name="home"></ion-icon>
                </span>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="options">
            <a href="/turnos" class="box-icon-center">
                <span class="icons">
                    <ion-icon name="trail-sign"></ion-icon>
                </span>
                <span class="text">Rutas y Horarios</span>
            </a>
        </li>
        <li class="options">
            <a href="/boletos" class="box-icon-center">
                <span class="icons">
                    <ion-icon name="receipt"></ion-icon>
                </span>
                <span class="text">Boletas</span>
            </a>
        </li>
    </div>
    <div class="user-menu-bar">
        <a class="user-icon" href="#">
            <label>{{ Auth::user()->name }} -  {{ Auth::user()->rol }}</label>
            <span><ion-icon name="person-circle"></ion-icon></span>
        </a>
        <div class="menu" id="menu">
            <span><ion-icon name="list"></ion-icon></span>
        </div>
    </div>
</header>
<div class="sidebar">
    <div class="list hidden" id="list" >
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <span class="text">Mi perfil</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="color-palette"></ion-icon>
                </span>
                <span class="text">Apariencia</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="language"></ion-icon>
                </span>
                <span class="text">Idiomas</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="newspaper"></ion-icon>
                </span>
                <span class="text">Novedades</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="shield"></ion-icon>
                </span>
                <span class="text">Privacidad y Seguridad</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings"></ion-icon>
                </span>
                <span class="text">Soporte Técnico</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                            @csrf
            <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
                <span class="icon">
                    <ion-icon name="power"></ion-icon>
                </span>
                <span class="text">Cerrar Sesión</span>
            </x-dropdown-link>
        </form>
        </li>
    </div>
</div>


<script src="{{ asset ('js/animaciones.js') }}"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
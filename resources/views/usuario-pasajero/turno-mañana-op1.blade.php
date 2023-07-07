@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
    <!--contenido de la ruta Aviacion - Campus-->
    <main>
        <div class="info">
            <div class="title-box2">
                <a href="/mañana"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Av. Aviación - Av. Javier Prado - Campus || 7:15 AM</h3>
            </div>
            <img src="img/mapa.png">
            <div class="info-text">
                <h3>INFORMACIÓN DE LA RUTA</h3>
                <ul class="info-detalle">
                    <li>Chofer actual</li>
                    <p>Pedro Castillo</p>
                    <li>Punto de partida</li>
                    <p>Avenida Aviación</p>
                    <li>Punto de llegada</li>
                    <p>Campus sede Centro - Santa Anita</p>
                    <li>Hora de partida</li>
                    <p>7:15 AM</p>
                    <li>Hora de destino aproximado</li>
                    <p>7:40 PM</p>
                    <li>Paraderos permitidos</li>
                    <ul class="paraderos">
                        <li>Inicio de ruta: Altura Cine STAR Aviación (a una cuadra de Av. Javier Prado)</li>
                        <li>Paradero: Av. Javier Prado con la Ca. Velasquez (a una cuadra de San Luis)</li>
                        <li>Fin de ruta: Campus sede Centro - Santa Anita</li>
                    </ul>
                </ul>
            </div>
        </div>
    </main>
@stop
@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
    <!--contenido de la ruta Pte Nuevo - Campus-->
    <main>
        <div class="info">
            <div class="title-box2">
                <a href="/mañana"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Puente Nuevo - Campus || 7:20 AM</h3>
            </div>
            <img src="img/mapa.png">
            <div class="info-text">
                <h3>INFORMACIÓN DE LA RUTA</h3>
                <ul class="info-detalle">
                    <li>Chofer actual</li>
                    <p>Pedro Castillo</p>
                    <li>Punto de partida</li>
                    <p>Puente Nuevo</p>
                    <li>Punto de llegada</li>
                    <p>Campus sede Centro - Santa Anita</p>
                    <li>Hora de partida</li>
                    <p>7:20 AM</p>
                    <li>Hora de destino aproximado</li>
                    <p>7:40 PM</p>
                    <li>Paraderos permitidos</li>
                    <ul class="paraderos">
                        <li>Inicio de ruta: Puente Nuevo (altura grifo REPSOL)</li>
                        <li>Fin de ruta: Campus sede Centro - Santa Anita</li>
                    </ul>
                </ul>
            </div>
        </div>
    </main>
@stop
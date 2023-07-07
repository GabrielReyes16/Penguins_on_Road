@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
    <!--contenido de la ruta Campus - Ov. la Perla-->
    <main>
        <div class="info">
            <div class="title-box2">
                <a href="/tarde"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Campus - Ov. la Perla || 6:10 PM</h3>
            </div>
            <img src="img/mapa.png">
            <div class="info-text">
                <h3>INFORMACIÓN DE LA RUTA</h3>
                <ul class="info-detalle">
                    <li>Chofer actual</li>
                    <p>Pedro Castillo</p>
                    <li>Punto de partida</li>
                    <p>Campus sede Centro - Santa Anita</p>
                    <li>Punto de llegada</li>
                    <p>Ovalo la Perla</p>
                    <li>Hora de partida</li>
                    <p>6:10 PM</p>
                    <li>Hora de destino aproximado</li>
                    <p>8:00 PM</p>
                    <li>Paraderos permitidos</li>
                    <ul class="paraderos">
                        <li>Inicio de ruta: Campus sede Centro - Santa Anita</li>
                        <li>Paradero: Av. Frutales con Av. Javier Prado</li>
                        <li>Paradero: U. de LIMA (Javier Prado) por la vía auxiliar</li>
                        <li>Paradero: Av. Javier Prado con Av. Agustin de la Rosa Toro</li>
                        <li>Paradero: Av. Javier Prado con Av. San Luis</li>
                        <li>Paradero: Av. Javier Prado con Av. Aviación</li>
                        <li>Paradero: Ricardo Palma (Javier Prado)</li>
                        <li>Paradero: Av. Javier Prado con Ca. las Orquídeas (antes de la clínica J. Prado)</li>
                        <li>Paradero: Av. Javier Prado con Av. Petit Thouars</li>
                        <li>Paradero: Av. Javier Prado con Av. Las Palmeras</li>
                        <li>Paradero: Av. Javier Prado con Av. Los Alamos</li>
                        <li>Paradero: Av. Javier Prado con Av. Las Flores</li>
                        <li>Paradero: Av. Javier Prado con Ca. Roma (antes de Salaverry)</li>
                        <li>Paradero: San Felipe (Av. Gregorio Escobedo con Av. Sanchez Carrión)</li>
                        <li>Paradero: Av. La Marina con Av. Sucre</li>
                        <li>Paradero: Av. La Marina con Av. Universitaria</li>
                        <li>Paradero: Av. La Marina con Av. Rafael Escardo (HIRAOKA)</li>
                        <li>Paradero: Av. La Marina con Av. Faucett</li>
                        <li>Fin de ruta: Ovalo la Perla</li>
                    </ul>
                </ul>
            </div>
        </div>
    </main>
@stop
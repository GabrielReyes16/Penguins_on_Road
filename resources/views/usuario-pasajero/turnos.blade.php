@extends ('plantilla')

@section ('css-personalizado')
    {{ asset ('css/Passenger/style-bus.css') }}
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
  <!--contenido turnos disponibles-->
    <main>
        <div class="turnos">
            <div class="title-box1">
                <h3>Los turnos disponibles son:</h3>
            </div>
            
            <div class="btn-turno">
                <a href="EarlyTurn.html">TURNO MAÑANA</a>
            </div>
            <div class="btn-turno">
                <a href="LateTurn.html">TURNO TARDE</a>
            </div>
            <div class="btn-turno">
                <a href="NightTurn.html">TURNO NOCHE</a>
            </div>

        </div>
    <main>
@stop
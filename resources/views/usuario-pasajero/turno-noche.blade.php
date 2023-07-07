@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
    <!--contenido rutas del turno noche-->
    <main>
        <div class="turnos">
            <div class="title-box2">
                <a href="/turnos"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Turno noche de Lunes a Viernes del campus camino a:</h3>
            </div>
              
            <div class="btn-ruta">
                <a href="#">Campus - Petit Thouars || 10:20 PM</a>
            </div>
            <div class="btn-ruta">
                <a href="#">Campus - Chaclacayo || 10:20 PM</a>
            </div>
        </div>
    </main>
@stop
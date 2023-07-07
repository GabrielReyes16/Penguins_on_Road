@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
  <!--contenido rutas del turno tarde-->
  <main>
        <div class="turnos">
            <div class="title-box2">
                <a href="/turnos"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Turno tarde de Lunes a Viernes del campus camino a:</h3>
            </div>
              
            <div class="btn-ruta">
                <a href="/tt-op1">Campus - Ov. de la Perla || 6:10 PM</a>
            </div>

            <div class="btn-ruta">
                <a href="#">Campus - Puente Atocongo || 6:10 PM</a>
            </div>

            <div class="btn-ruta">
                <a href="#">Campus - Mega Plaza || 6:10 PM</a>
            </div>

            <div class="btn-ruta">
                <a href="#">Campus - Chaclacayo || 6:10 PM</a>
            </div>
        </div>
    </main>
@stop
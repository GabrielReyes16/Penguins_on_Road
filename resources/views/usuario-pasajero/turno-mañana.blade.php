@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
  <!--contenido rutas del turno mañana-->
  <main>
        <div class="turnos">
            <div class="title-box2">
                <a href="/turnos"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Turno mañana de Lunes a Viernes camino al campus:</h3>
            </div>
              
            <div class="btn-ruta">
                <a href="/op1">Av. Aviación - Av. Javier Prado - Campus || 7:15 AM</a>
            </div>

            <div class="btn-ruta">
                <a href="#">Puente Nuevo - Campus || 7:20 AM</a>
            </div>
        </div>
    </main>
@stop
@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
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
            
                @foreach ($turnos as $turno)
                <div> 
                    <a href="{{ route('usuario-pasajero.seleccion-turno', ['id' => $turno->id_turno]) }}" class="btn-turno">{{'Turno'}} {{ $turno->nombre }}</a>
                </div>
                @endforeach

        </div>
    </main>
@stop
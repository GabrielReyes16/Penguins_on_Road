@extends ('usuario-pasajero.navbar-rutas')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section ('contenido')  
    <main>
        <div class="turnos">
            <div class="title-box2">
                <a href="/turnos"><ion-icon name="arrow-back-circle"></ion-icon></a>
                <h3>Turno {{ $turno->nombre }} de Lunes a Viernes del campus camino a:</h3>
            </div>
            @foreach ($rutas as $ruta) 
            <div class="btn-ruta">
                <a href="{{ route('usuario-pasajero.ver-ruta', ['id_turno' => $turno->id_turno, 'id_ruta' => $ruta->id_ruta]) }}">{{ $ruta->punto_inicial }} - {{ $ruta->punto_final }} || {{ $turno->hora_inicio }}</a>
            </div>
            @endforeach
        </div>
    </main>
@stop

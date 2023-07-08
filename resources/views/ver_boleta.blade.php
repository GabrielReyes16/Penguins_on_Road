@extends ('usuario-pasajero.navbar-home')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-ticket.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
@stop

@section ('titulo')
    {{ 'Menu || Boletas de viaje' }}
@stop

@section ('contenido')
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Detalles de la boleta de viaje</h1>

    <p class="mb-2"><span class="font-bold">ID de boleta:</span> {{ $boleta->id_boleta }}</p>
    <p class="mb-2"><span class="font-bold">Fecha de viaje:</span> {{ $boleta->fecha_viaje }}</p>
    <p class="mb-2"><span class="font-bold">Hora de abordaje:</span> {{ $boleta->hora_abordaje }}</p>
    <p class="mb-2"><span class="font-bold">Pasajero N°:</span> {{ $boleta->aforo_viaje }}</p>
    <p class="mb-2"><span class="font-bold">Punto de inicio del viaje:</span> {{ $boleta->viaje->ruta->punto_inicial }} </p>
    <p class="mb-2"><span class="font-bold">Punto de fin del viaje:</span> {{ $boleta->viaje->ruta->punto_final }}</p>
</div>

@endsection

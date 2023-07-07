@extends('usuario-pasajero.navbar-rutas')

@section('css-personalizado')
    <link rel="stylesheet" href="{{ asset('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
@stop

@section('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section('contenido')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold text-center mt-8">Turno tarde | 6:10pm</h2>
        <p class="text-4xl  font-bold text-black text-center py-2">Campus-Ov. de la Perla</p>
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row">
                <!-- Mapa -->
                <div class="w-full md:w-2/3">
                    <div id="map" class="h-64 md:h-full">
                    </div>
                </div>
        
                <!-- Información de la ruta -->
                <div class="w-full md:w-1/3 px-4 py-8 md:px-8 md:py-0">
                    <h2 class="text-2xl font-bold mb-4">Información de la ruta</h2>
                    
                    <!-- Chofer actual -->
                    <div class="mb-4">
                        <h4 class="font-bold">Chofer actual</h4>
                        <p>Nombre del chofer</p>
                    </div>
                    
                    <!-- Punto de partida -->
                    <div class="mb-4">
                        <h4 class="font-bold">Punto de partida</h4>
                        <p>Dirección de partida</p>
                    </div>
                    
                    <!-- Hora de partida -->
                    <div class="mb-4">
                        <h4 class="font-bold">Hora de partida</h4>
                        <p>12:00 PM</p>
                    </div>
                    
                    <!-- Paraderos -->
                    <div class="mb-4">
                        <h4 class="font-bold">Paraderos</h4>
                        <ul>
                            @foreach ($paraderos as $paradero)
                                <li></li>
                                <li>{{ $paradero->nombre }} </li>
                                <li>{{ $paradero->ubicacion }}</li>
                                <li></li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Hora estimada de fin -->
                    <div class="mb-4">
                        <h4 class="font-bold">Hora estimada de fin</h4>
                        <p>01:00 PM</p>
                    </div>
                    
                    <!-- Punto de fin -->
                    <div>
                        <h4 class="font-bold">Punto de fin</h4>
                        <p>Dirección de fin</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script src="{{ asset('js/map.js') }}"></script>
    @stop
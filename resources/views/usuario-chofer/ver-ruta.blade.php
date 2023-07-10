@extends('usuario-chofer.navbar-rutas')

@section('css-personalizado')
    <link rel="stylesheet" href="{{ asset('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
        /* Estilos personalizados */
        #mapas {
            height: 500px;
            width: 80%;
            margin-left: 10%;
            z-index: 0;
        }

        @media (min-width: 768px) {
            #mapas {
                height: 550px;
                width: 120%;
                margin-left: -10%;
                z-index: 0;
            }
        }
        
        /* Otros estilos personalizados... */
    </style>
@stop

@section('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section('contenido')
    <main>
    <div class="info">
        <div class="title-box2">
            <a href="/view-turnos/{{$ruta->turno->id_turno}}}"><ion-icon name="arrow-back-circle"></ion-icon></a>
            <h3>{{ $ruta->punto_inicial }} ➡️ {{ $ruta->punto_final }} || {{ $ruta->turno->hora_inicio }}</h3>
        </div>
        <!-- Mapa -->
        <div class="w-full md:w-2/3 mb-4">
            <div id="mapas"></div>
        </div>
        <div class="info-text">
            <h3>INFORMACIÓN DE LA RUTA</h3>
            <ul class="info-detalle">
                
                <li>Punto de partida</li>
                <p>{{ $ruta->punto_inicial }}</p>
                <li>Punto de llegada</li>
                <p>{{ $ruta->punto_final }}</p>
                <li>Hora de partida</li>
                <p>{{$horaInicio->format('h:i A') }}</p>
                <li>Hora de destino aproximado</li>
                <p>{{ $horaFinEstimada->format('h:i A') }}</p>
                <li>Paraderos permitidos</li>
                <ul class="paraderos">
                    @foreach ($paraderos as $paradero)
                        <li>{{ $paradero->nombre }}</li>
                    @endforeach
                </ul>
            </ul>
        </div>
    </div>
    </main>
    <script>
        // Inicializar mapa
        var map = L.map('mapas').setView([-12.04434, -76.95324], 11);
        map.setMinZoom(11);
        map.setMaxZoom(18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

                // Crear el marcador y el popup para el punto de partida
        var startPointMarker = L.marker([-12.04434, -76.95324]).addTo(map);

        // Configurar el estilo del marcador según el turno seleccionado
        @if ($ruta->turno->nombre === 'Tarde')
            startPointMarker.setIcon(L.icon({
                iconUrl: '{{ asset('img/marker.png') }}',
                iconSize: [50, 50],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            }));
            // Agregar el popup para el punto de partida
            startPointMarker.bindPopup('CAMPUS TECSUP').openPopup();
        @elseif ($ruta->turno->nombre === 'Noche')
            startPointMarker.setIcon(L.icon({
                iconUrl: '{{ asset('img/marker.png') }}',
                iconSize: [50, 50],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            }));
            // Agregar el popup para el punto de partida
            startPointMarker.bindPopup('CAMPUS TECSUP').openPopup();
        @endif

        

        // Agregar marcadores para cada paradero en el mapa
        @foreach ($paraderos as $paradero)
            L.marker([{{ $paradero->latitud }}, {{ $paradero->longitud }}]).addTo(map)
                .bindPopup('{{ $paradero->nombre }}')
                .openPopup();
        @endforeach 
    </script>
@stop

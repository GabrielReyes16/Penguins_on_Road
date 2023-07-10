@extends('usuario-pasajero.navbar-rutas')

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
        @media (max-width: 650px) {
            #map {
                height: 550px;
                width: 90%;
                margin-left: 5%
            }
        }

        @media (min-width: 651px) and (max-width: 1200px) {
            #map {
                height: 550px;
                width: 100%;
                margin-left: 5%
            }
        }

        @media (min-width: 1201px) {
            #map {
                height: 500px;
                width: 100%;
            }
        }
    </style>
@stop

@section('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section('contenido')
    <main>
    <div class="info">
        <div class="title-box2">
            <a href="/turnos/{{$ruta->turno->id_turno}}}"><ion-icon name="arrow-back-circle"></ion-icon></a>
            <h3>{{ $ruta->punto_inicial }} ➡️ {{ $ruta->punto_final }} || {{ $ruta->turno->hora_inicio }}</h3>
        </div>
        <!-- Mapa -->
        <div class="w-full md:w-2/3 mb-4">
            <div id="map"></div>
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
        var map = L.map('map').setView([-12.04434, -76.95324], 11);
        map.setMinZoom(11);
        map.setMaxZoom(18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var startPointMarker = L.marker([-12.04434, -76.95324]).addTo(map);

        @if ($ruta->turno->nombre === 'Tarde')
            startPointMarker.setIcon(L.icon({
                iconUrl: '{{ asset('img/marker.png') }}',
                iconSize: [50, 50],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            }));
            startPointMarker.bindPopup('CAMPUS TECSUP').openPopup();
        @elseif ($ruta->turno->nombre === 'Noche')
            startPointMarker.setIcon(L.icon({
                iconUrl: '{{ asset('img/marker.png') }}',
                iconSize: [38, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            }));
            startPointMarker.bindPopup('CAMPUS TECSUP').openPopup();
        @endif

        @foreach ($paraderos as $paradero)
            L.marker([{{ $paradero->latitud }}, {{ $paradero->longitud }}]).addTo(map)
                .bindPopup('{{ $paradero->nombre }}')
                .openPopup();
        @endforeach 
    </script>
@stop

@extends('usuario-pasajero.navbar-rutas')

@section('css-personalizado')
    <link rel="stylesheet" href="{{ asset('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
@stop

@section('titulo')
    {{ 'Menu || Turnos y Horarios' }}
@stop

@section('contenido')
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-center mt-8">{{'Turno '}}{{ $turno->nombre }} | {{ $turno->hora_inicio }}</h2>
        <p class="text-lg text-center mt-4">Seleccione una ruta</p>
        <div class="w-full flex justify-center mt-8">
            <table class="w-full max-w-md bg-white shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200">Punto Inicial</th>
                        <th class="py-2 px-4 bg-gray-200">Punto Final</th>
                        <th class="py-2 px-4 bg-gray-200">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rutas as $ruta)
                        <tr>
                            <td class="py-4 px-6">{{ $ruta->punto_inicial }}</td>
                            <td class="py-4 px-6">{{ $ruta->punto_final }}</td>
                            <td class="py-4 px-6">
                                <div class="flex justify-center">
                                    @if (isset($turno->id_turno))
                                        <a href="{{ route('usuario-pasajero.ver-ruta', ['id_turno' => $turno->id_turno, 'id_ruta' => $ruta->id_ruta]) }}" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @else
                                        <span class="text-gray-400">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>
@stop

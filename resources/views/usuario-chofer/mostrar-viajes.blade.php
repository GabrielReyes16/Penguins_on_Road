
@extends ('usuario-chofer.navbar-boletas')

@section ('titulo')
    {{ 'Menu || Scaner' }}
@stop

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
@stop

@section ('contenido')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex flex-row items-center">
                        <form action="{{ route('usuario-chofer.crear-viaje') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{ Auth::id() }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Crear Viaje
                            </button>
                        </form>
                        @if(session('success'))
                        <div class="bg-green-200 text-green-800 p-4 ml-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>                    
                    <h4 class="text-lg text-gray-800 font-semibold mb-4">Lista de Viajes:</h4>
                    <li class="bg-slate-700 p-4 rounded-lg mb-4 flex items-center justify-between">
                        <span class="w-1/6 text-white">Fecha del viaje</span>
                        <span class="w-1/6 text-white">Punto inicial</span>
                        <span class="w-1/6 text-white">Punto final</span>
                        <span class="w-1/6 text-white">Duración del viaje</span>
                        <span class="w-1/6 text-white">Estado</span>                              
                        <span class="w-1/6 text-white">Opciones</span> 
                    </li>
                    <ul>
                        @foreach ($viajes as $viaje)
                            <li class="bg-slate-200 p-4 rounded-lg mb-4 flex items-center justify-between">
                                <span class="w-1/6">{{ $viaje->fecha_viaje }}</span>
                                <span class="w-1/6">{{ $viaje->ruta->punto_inicial }}</span>
                                <span class="w-1/6">{{ $viaje->ruta->punto_final }}</span>
                                <span class="w-1/6 ">{{$viaje->duracion}}</span>
                                <span class="w-1/6">{{ $viaje->estado }}</span>                              
                                <div class="w-1/6 flex items-center  space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
@stop
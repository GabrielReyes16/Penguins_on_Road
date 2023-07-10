
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

    <div class="contenido">
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
                            <span class="w-1/6 text-white">Aforo</span>
                            <span class="w-1/6 text-white">Estado</span>                              
                            <span class="w-1/6 text-white">Duración del viaje</span> 
                        </li>
                        <ul>
                            @foreach ($viajes as $viaje)
                            <li class="bg-slate-200 p-4 rounded-lg mb-4 flex items-center justify-between">
                                <span class="w-1/6">{{ $viaje->fecha_viaje }}</span>
                                <span class="w-1/6">{{ $viaje->ruta->punto_inicial }}</span>
                                <span class="w-1/6">{{ $viaje->ruta->punto_final }}</span>
                                <span class="w-1/6">{{ $viaje->aforo_actual }}/{{$viaje->bus->aforo}}</span>
                                <div class="w-1/6">
                                    <form action="{{ route('usuario-chofer.actualizar-estado-viaje') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_viaje" value="{{ $viaje->id_viaje }}">
                                        <select name="estado_viaje" onchange="this.form.submit()"
                                                class="border border-gray-300 rounded p-1 @if ($viaje->estado == 'Activo') bg-green-200 @elseif ($viaje->estado == 'Inactivo') @endif">
                                            <option value="Activo" @if ($viaje->estado == 'Activo') selected @endif>Activo</option>
                                            <option value="Inactivo" @if ($viaje->estado == 'Inactivo') selected @endif>Inactivo</option>
                                        </select>
                                    </form>
                                </div>
                                
                                <div class="w-1/6 flex items-center space-x-2">
                                    
                                    @if (($viaje->hora_inicio !== null && $viaje->hora_final !== null))
                                        <span class="w-1/6">{{ $viaje->duracion }}</span>
                                    @else
                                        @if ($viaje->hora_inicio == null)
                                            <form action="{{ route('usuario-chofer.comenzar-viaje', ['idViaje' => $viaje->id_viaje]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Comenzar viaje
                                                </button>
                                            </form>
                                        @endif
                                        @if ($viaje->hora_inicio != null)
                                            <form action="{{ route('usuario-chofer.terminar-viaje', ['idViaje' => $viaje->id_viaje]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Terminar viaje
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
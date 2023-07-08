@extends ('usuario-pasajero.navbar-abordaje')

@section ('titulo')
    {{ 'Menu || Abordaje' }}
@stop

@section ('contenido')
<main>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('guardar_reserva') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="id_usuario" class="block text-sm font-medium text-gray-700">ID de Usuario:</label>
                            <input type="text" name="id_usuario" id="id_usuario" value="{{$id_usuario}}" class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="id_viaje" class="block text-sm font-medium text-gray-700">Viajes:</label>
                            <select name="id_viaje" id="id_viaje" class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md">
                                @foreach ($viajes as $viaje)
                                    @php
                                        $ruta = $viaje->ruta;
                                        $nombre_ruta = $ruta->punto_inicial . ' ➡️ ' . $ruta->punto_final;
                                    @endphp
                                    <option value="{{ $viaje->id_viaje }}">{{ $nombre_ruta }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">{{ __('Solicitar abordaje') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop


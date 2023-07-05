@extends('usuario-pasajero.navbar-abordaje')

@section('titulo')
    {{ 'Editar Reserva' }}
@stop

@section('contenido')
<main>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg text-center font-semibold mb-4">{{ __('Editar Reserva') }}</h3>
                    <form action="{{ route('actualizar_reserva', ['idReserva' => $reserva->id_reserva]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="id_viaje" class="block font-medium text-sm text-gray-700">Seleccionar nueva ruta:</label>
                            <select name="id_viaje" id="id_viaje" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                                @foreach($viajes as $viaje)
                                    <option value="{{ $viaje->id_viaje }}" @if($viaje->id_viaje === $reserva->id_viaje) selected @endif>{{ $reserva->viaje->ruta->punto_inicial }} ➡️ {{ $reserva->viaje->ruta->punto_final }}</option>
                                @endforeach
                            </select>
                            @error('id_viaje')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">{{ __('Actualizar Reserva') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

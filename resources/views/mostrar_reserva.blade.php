@extends ('usuario-pasajero.navbar-abordaje')

@section ('titulo')
    {{ 'Reserva' }}
@stop

@section ('contenido')
<main>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg text-center font-semibold mb-4">{{ __('Presenta el código QR generado al conductor al momento de subir al bus') }}</h3>
                    <img src="data:image/svg+xml;base64,{{ base64_encode($codigoQR) }}" alt="QR Code" class="mx-auto" style="max-width: 200px;">
                    <div class="mt-4">
                        <p class="text-center">{{ __('Pasajero:') }} {{ $reserva->user->name }}</p>
                        <p class="text-center">{{ __('Ruta seleccionada:') }} {{ $reserva->viaje->ruta->punto_inicial }} ➡️ {{ $reserva->viaje->ruta->punto_final }}</p>
                    </div>
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('editar_reserva', ['idReserva' => $reserva->id_reserva]) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">{{ __('Editar Reserva') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop


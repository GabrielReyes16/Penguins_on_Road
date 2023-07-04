<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg text-center font-semibold mb-4">{{ __('Presenta el código QR generado al conductor al momento de subir al bus') }}</h3>
                    <img src="data:image/svg+xml;base64,{{ base64_encode($codigoQR) }}" alt="QR Code" class="mx-auto" style="max-width: 200px;">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    {{ __("Bienvenido. Penguins on Road es el software de gestión de buses de Tecsup. Podras registrar tu abordaje, ver tu boletas de viaje y más cosas!. Espero disfrutes del software") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

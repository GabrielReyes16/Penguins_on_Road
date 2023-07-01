<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  {{ __("Penguins on Road es el software de gestion de buses de Tecsup. Podras ver los horarios del servicio, ver sus boletas de viaje, informacion de las rutas, choferes y buses que Tecsup pone a disposicion de los usuarios.") }}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

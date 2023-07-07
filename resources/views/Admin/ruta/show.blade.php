<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Información de ruta  {{ $ruta->punto_inicial }} {{ $ruta->punto_final }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion de este usuario.") }}
        </p>
    </x-slot>
    <section class="content container-fluid" style="text-align: center">
        <div class="row">

            <div class="card" style="color: white;">
                <div class="card-header">
                    <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                        style="color: white;  background-color: blue;">
                        <a href="{{ route('admin.rutas.index') }}"> {{ __('Volver') }}</a>
                    </div>
                </div>
                <br><br><br>
                <div class="flex justify-center">
                    <table id="users-table" class="min-w-full border border-gray-200 text-center">
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-b font-bold">Id Ruta:</strong>
                            {{ $ruta->id_ruta }}
                        </div>
                        <div class="form-group">
                            <td class="px-4 py-2 border-b font-bold">Id Turno:</strong>
                            {{ $ruta->id_turno }}
                        </div>
                        <div class="form-group">
                            <td class="px-4 py-2 border-b font-bold">Punto Inicial:</strong>
                            {{ $ruta->punto_inicial }}
                        </div>
                        <div class="form-group">
                            <td class="px-4 py-2 border-b font-bold">Punto Final:</strong>
                            {{ $ruta->punto_final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

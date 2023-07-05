<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Información de ruta  {{ $ruta->punto_inicial }} {{ $ruta->punto_final }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion de este usuario.") }}
        </p>
    </x-slot>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información de ruta  {{ $ruta->punto_inicial }}  ->  {{ $ruta->punto_final }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.rutas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Ruta:</strong>
                            {{ $ruta->id_ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Turno:</strong>
                            {{ $ruta->id_turno }}
                        </div>
                        <div class="form-group">
                            <strong>Punto Inicial:</strong>
                            {{ $ruta->punto_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Punto Final:</strong>
                            {{ $ruta->punto_final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

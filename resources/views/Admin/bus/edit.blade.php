<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Editar información de {{ $bus->placa }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion de este usuario.") }}
        </p>
    </x-slot>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                                style="color: white;  background-color: blue;">
                                <a href="{{ route('admin.users.index') }}"> {{ __('Volver') }}</a>
                            </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.buses.update', $bus->id_bus) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.bus.form')
                        </div>
                    </form>
                </div>
            </div>
        </div >
    </section>
</x-app-layout>

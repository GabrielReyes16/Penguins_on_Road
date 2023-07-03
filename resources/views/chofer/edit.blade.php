<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Editar información de {{ $chofer->user->name }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion del chofer.") }}
        </p>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;  background-color: blue;">
                        <a  href="{{ route('admin.choferes.index') }}"> {{ __('Volver') }}</a>
                    </div>
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-200">
                            {{ __('Información del chofer') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-400">
                            {{ __('Estos son los datos del chofer. Se cauteloso con los cambios a realizar.') }}
                        </p>
        <form method="post" action="{{ route('choferes.update', $chofer->id_chofer) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            {{-- Nombre --}}
            <div class="max-w-xl">
                <x-input-label for="$chofer->user->name" :value="__('Nombres')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $chofer->user->name)" required autofocus autocomplete="name"  disabled/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            {{-- Bus --}}
            <div class="max-w-xl">
                <x-input-label for="id_bus" :value="__('Bus asignado')" />
                <select name="id_bus" id="id_bus" class="form-control">
                    @foreach($buses as $bus)
                    <option value="{{ $bus->id_bus }}" {{ $bus->id_bus == $chofer->id_bus ? 'selected' : '' }}>
                        {{ $bus->placa }}
                    </option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('id_bus')" />
            </div>

            {{-- Empresa --}}
            <div class="max-w-xl">
                <x-input-label for="id_empresa" :value="__('Empresa asignada')" />
                    <select name="id_empresa" id="id_empresa" class="form-control">
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id_empresa }}" {{ $empresa->id_empresa == $chofer->id_empresa ? 'selected' : '' }}>{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('id_empresa')" />
            </div>

             {{-- Licencia de Conducir --}}
             <div class="max-w-xl">
                 <x-input-label for="licencia_conducir" :value="__('Licencia de conducir')" />
                 <x-text-input id="licencia_conducir" name="licencia_conducir" type="text" class="mt-1 block w-full" :value="old('name', $chofer->licencia_conducir)" required autofocus autocomplete="licencia_conducir" />
                 <x-input-error class="mt-2" :messages="$errors->get('licencia_conducir')" />
             </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Listo') }}</x-primary-button>
            </div>
        </form>
    </div>
</div>
</div

</x-app-layout>
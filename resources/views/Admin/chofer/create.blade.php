<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Datos de Chofer
        </h2>
    </x-slot>
    <x-guest-layout>
        <form method="POST" action="{{ route('admin.users.storeChofer',$user->id_usuario) }}">
            @csrf

            <div class="max-w-xl">
                <x-input-label for="id_usuario" :value="__('ID Usuario')" />
                <x-text-input id="id_usuario" name="id_usuario" type="text" class="mt-1 block w-full"
                    :value="old('id_usuario', $id_usuario)" required autofocus autocomplete="id_usuario" />
                <x-input-error class="mt-2" :messages="$errors->get('id_usuario')" />
            </div>
            {{-- Nombre --}}
            <div class="max-w-xl">
                <x-input-label for="$chofer->user->name" :value="__('Nombres')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" disabled />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            {{-- Bus --}}
            <div class="max-w-xl">
                <x-input-label for="id_bus" :value="__('Bus asignado')" />
                <select name="id_bus" id="id_bus" class="form-control">
                    <option value="">Selecciona una opción</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id_bus }}">
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
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id_empresa }}"
                            >{{ $empresa->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('id_empresa')" />
            </div>

            {{-- Licencia de Conducir --}}
            <div class="max-w-xl">
                <x-input-label for="licencia_conducir" :value="__('Licencia de conducir')" />
                <x-text-input id="licencia_conducir" name="licencia_conducir" type="text" class="mt-1 block w-full"
                     required autofocus autocomplete="licencia_conducir" />
                <x-input-error class="mt-2" :messages="$errors->get('licencia_conducir')" />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Listo') }}</x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>

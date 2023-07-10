<x-app-layout>
    <br>
    <div class="rectangulo"> Editar al chofer {{ $chofer->user->name }}</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="lg">
                    <h2 class="text-lg font-medium text-gray-800">
                        {{ __('Información del chofer') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-800">
                        {{ __('Estos son los datos del chofer. Se cauteloso con los cambios a realizar.') }}
                    </p>
                    <form method="post" action="{{ route('admin.choferes.update', $chofer->id_chofer) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        {{-- Nombre --}}
                        <div class="max-w-xl">
                            <x-input-label for="$chofer->user->name" :value="__('Nombres')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $chofer->user->name)" required autofocus autocomplete="name" disabled />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        {{-- Bus --}}
                        <div class="max-w-xl">
                            <x-input-label for="id_bus" :value="__('Bus asignado')" />
                            <select name="id_bus" id="id_bus" class="form-control">
                                <option value="">Sin bus</option>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id_bus }}"
                                        {{ $bus->id_bus == $chofer->id_bus ? 'selected' : '' }}>
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
                                        {{ $empresa->id_empresa == $chofer->id_empresa ? 'selected' : '' }}>
                                        {{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('id_empresa')" />
                        </div>

                        {{-- Licencia de Conducir --}}
                        <div class="max-w-xl">
                            <x-input-label for="licencia_conducir" :value="__('Licencia de conducir')" />
                            <x-text-input id="licencia_conducir" name="licencia_conducir" type="text"
                                class="mt-1 block w-full" :value="old('name', $chofer->licencia_conducir)" required autofocus
                                autocomplete="licencia_conducir" />
                            <x-input-error class="mt-2" :messages="$errors->get('licencia_conducir')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="estado" :value="__('Estado')" />
                            <select name="estado" id="estado" class="form-control">
                                <option value="Activo" {{ $chofer->estado === 'Activo' ? 'selected' : '' }}>Activo
                                </option>
                                <option value="Inactivo" {{ $chofer->estado === 'Inactivo' ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a
                                    href="{{ route('admin.buses.index') }}"> Volver</a></button>
                            <x-primary-button class="create">
                                {{ __('Listo') }}
                            </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

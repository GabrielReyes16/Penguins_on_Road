<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Asígnale datos al chofer') }}</div>
    <br>
    <div class="flex justify-center">
        <div class="crear_item">
            <form method="POST" action="{{ route('admin.users.storeChofer', $user->id_usuario) }}">
                @csrf

                <div class="bg-gray-200 rounded-md p-4">
                    <div class="space-y-4">
                        {{-- ID del usuario oculto --}}
                        <x-text-input id="id_usuario" name="id_usuario" type="text" class="mt-1 block w-full"
                            :value="old('id_usuario', $id_usuario)" required hidden autofocus autocomplete="id_usuario" />
                        {{-- Nombre --}}
                        <div class="max-w-xl">
                            <x-input-label for="$chofer->user->name" :value="__('Nombres')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" disabled />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        {{-- Bus --}}
                        <div class="max-w-xl">
                            <x-input-label for="id_bus" :value="__('Bus asignado')" />
                            <select name="id_bus" id="id_bus" class="form-control">
                                <option value="">Sin bus</option>
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
                                    <option value="{{ $empresa->id_empresa }}">{{ $empresa->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('id_empresa')" />
                        </div>

                        {{-- Licencia de Conducir --}}
                        <div class="max-w-xl">
                            <x-input-label for="licencia_conducir" :value="__('Licencia de conducir')" />
                            <x-text-input id="licencia_conducir" name="licencia_conducir" type="text"
                                class="mt-1 block w-full" required autofocus autocomplete="licencia_conducir" />
                            <x-input-error class="mt-2" :messages="$errors->get('licencia_conducir')" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a
                                href="{{ route('admin.users.create') }}"> Volver</a></button>
                        <x-primary-button class="create">
                            {{ __('Listo') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div> <br>

</x-app-layout>

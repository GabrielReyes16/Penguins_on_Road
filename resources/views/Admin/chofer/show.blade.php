<x-app-layout>
    <br>
    <div class="rectangulo"> Informacion de {{ $chofer->user->name }}</div>
    <br>
    <div class="flex justify-center">
        <div class="data">
            <div class="space-y-4">
                <div>
                    <label for="name" class="text-lg font-medium text-gray-700">Nombre</label>
                    <x-text-input id="name" class="block mt-1 w-full text-gray-700" type="text" name="name" :value="$chofer->user->name"
                        disabled autofocus autocomplete="name" />
                    <x-input-error-create :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="id_bus" class="text-lg font-medium text-gray-700">Bus actual</label>
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="id_bus"
                        :value="$chofer->bus->placa" disabled autocomplete="id_bus" />
                    <x-input-error-create :messages="$errors->get('id_bus')" class="mt-2" />
                </div>
                <div>
                    <label for="empresa" class="text-lg font-medium text-gray-700">Empresa</label>
                    <x-text-input id="empresa" class="block mt-1 w-full text-gray-700" type="text" name="empresa"
                        :value="$chofer->empresa->nombre" disabled autocomplete="empresa" />
                    <x-input-error-create :messages="$errors->get('empresa')" class="mt-2" />
                </div>
                <div>
                    <label for="licencia_conducir" class="text-lg font-medium text-gray-700">Licencia de
                        Conducir</label>
                    <x-text-input id="licencia_conducir" class="block mt-1 w-full text-gray-700" type="text"
                        name="licencia_conducir" :value="$chofer->licencia_conducir" disabled autocomplete="licencia_conducir" />
                    <x-input-error-create :messages="$errors->get('licencia_conducir')" class="mt-2" />
                </div>
                <div>
                    <label for="estado" class="text-lg font-medium text-gray-700">Estado</label>
                    <x-text-input id="rol" class="block mt-1 w-full text-gray-700" type="text" name="estado"
                        :value="$chofer->estado" disabled autocomplete="estado" />
                    <x-input-error-create :messages="$errors->get('estado')" class="mt-2" />
                </div>
            </div>
        </div>
        </form>
    </div>
    </div> <br>
    <div>
        <div style="color: white;">
            <div>
                <button class="create "><a href="{{ route('admin.choferes.index') }}"> Volver</a></button>

            </div>
        </div>
    </div>

</x-app-layout>

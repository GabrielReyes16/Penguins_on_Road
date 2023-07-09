<x-app-layout>
    <br>
    <div class="rectangulo"> Informacion del bus # {{ $bus->id_bus }}</div>
    <br>
    <section style="text-align: center">
        <div>
            <div>
                <div>
                    <div class="bg-gray-200 rounded-md p-4">
                        <div class="space-y-4">
                            <div>
                                <label for="placa" class="text-lg font-medium text-gray-700">Placa</label>
                                <x-text-input id="placa" class="block mt-1 w-full" type="text" name="placa"
                                    :value="$bus->placa" disabled autocomplete="placa" />
                                <x-input-error-create :messages="$errors->get('placa')" class="mt-2" />
                            </div>
                            <div>
                                <label for="aforo" class="text-lg font-medium text-gray-700">Aforo</label>
                                <x-text-input id="aforo" class="block mt-1 w-full" type="text" name="aforo"
                                    :value="$bus->aforo" disabled autocomplete="aforo" />
                                <x-input-error-create :messages="$errors->get('aforo')" class="mt-2" />
                            </div>
                            <div>
                                <label for="empresa" class="text-lg font-medium text-gray-700">Empresa
                                    Proveedora</label>
                                <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa"
                                    :value="$bus->empresa->nombre" disabled autocomplete="empresa" />
                                <x-input-error-create :messages="$errors->get('empresa')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div> <br>

            <div>
                <div style="color: white;">
                    <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded">
                        <button class="create "><a href="{{ route('admin.buses.index') }}"> Volver</a></button>

                </div>
            </div>
</x-app-layout>

<x-app-layout>
    <br>
    <div class="rectangulo"> Editar información del bus # {{ $bus->id_bus }}</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-200 rounded-md sm">
                <div class="max-w-xl">
                    <div class="lg">
                        <h2 class="text-lg font-medium text-gray-800">
                            {{ __('Información del bus') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-800">
                            {{ __('Estos son los datos del bus. Se cauteloso con los cambios a realizar.') }}
                        </p>
                    <form method="post" action="{{ route('admin.buses.update', $bus->id_bus) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="placa" :value="__('Placa del bus')" />
                            <x-text-input id="placa" name="placa" type="text" class="mt-1 block w-full"
                                :value="old('placa', $bus->placa)" required autofocus autocomplete="placa" />
                            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div>
                            <x-input-label for="aforo" :value="__('Aforo')" />
                            <x-text-input id="aforo" name="aforo" type="number" class="mt-1 block w-full"
                                :value="old('aforo', $bus->aforo)" required autofocus autocomplete="aforo" />
                            <x-input-error class="mt-2" :messages="$errors->get('aforo')" />
                            {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div>
                            <x-input-label for="empresa" :value="__('Empresa proveedora')" />
                            {{ Form::select('id_empresa', $empresas->pluck('nombre', 'id_empresa'), $bus->id_empresa, ['class' => 'form-control block mt-1 w-full' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una empresa']) }}
                            {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a
                            href="{{ route('admin.buses.index') }}"> Volver</a></button>
                    <x-primary-button class="create">
                        {{ __('Listo') }}
                    </x-primary-button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <br>
    <div class="rectangulo"> Editar información del bus # {{ $bus->id_bus }}</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-200 rounded-md sm">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('admin.users.update', $bus->id_bus) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <h3 class="text-lg font-medium text-gray-900" for="rol" :value="__('Roles')" >Placa del bus</h3>
                                    {{ Form::text('placa', $bus->placa, ['class' => 'form-control' . ($errors->has('placa') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
                                    {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    <h3 class="text-lg font-medium text-gray-900" for="rol" :value="__('Aforo')" >Aforo</h3>
                                    {{ Form::number('aforo', $bus->aforo, ['class' => 'form-control' . ($errors->has('aforo') ? ' is-invalid' : ''), 'placeholder' => 'Aforo']) }}
                                    {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    <h3 class="text-lg font-medium text-gray-900" for="rol" :value="__('Roles')" >Empresa Proveedora</h3>
                                    {{ Form::select('id_empresa', $empresas->pluck('nombre', 'id_empresa'), $bus->id_empresa, ['class' => 'form-control' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una empresa']) }}
                                    {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                </div>
                <br>
                <div class="flex items-center justify-end mt-4">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a href="{{ route('admin.buses.index') }}"> Volver</a></button>
                    <x-primary-button class="create">
                      {{ __('Listo') }}
                    </x-primary-button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


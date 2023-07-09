<div class="bg-gray-200 rounded-md p-4">
    <div class="space-y-4">
        <div>
            <label for="placa" class="text-lg font-medium text-gray-700">Placa del bus</label>
            {{ Form::text('placa', $bus->placa, ['class' => 'block mt-1 w-full' . ($errors->has('placa') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div>
            <label for="aforo" class="text-lg font-medium text-gray-700">Aforo</label>
            {{ Form::number('aforo', $bus->aforo, ['class' => 'block mt-1 w-full' . ($errors->has('aforo') ? ' is-invalid' : ''), 'placeholder' => 'Aforo']) }}
            {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div>
            <label for="empresa" class="text-lg font-medium text-gray-700">Empresa Proveedora</label>
            {{ Form::select('id_empresa', $empresas->pluck('nombre', 'id_empresa'), $bus->id_empresa, ['class' => 'form-control block mt-1 w-full' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una empresa']) }}
            {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a
                    href="{{ route('admin.buses.index') }}"> Volver</a></button>
            <x-primary-button class="create">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </div>
</div>

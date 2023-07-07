<div class="flex justify-center">
    <div class="p-4">
 <div class="form-group">
    <h3 class="text-lg font-medium text-gray-200" for="rol" :value="__('Roles')" >Placa del bus</h3>
            {{ Form::text('placa', $bus->placa, ['class' => 'form-control' . ($errors->has('placa') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <h3 class="text-lg font-medium text-gray-200" for="rol" :value="__('Aforo')" >Aforo</h3>
            {{ Form::number('aforo', $bus->aforo, ['class' => 'form-control' . ($errors->has('aforo') ? ' is-invalid' : ''), 'placeholder' => 'Aforo']) }}
            {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <h3 class="text-lg font-medium text-gray-200" for="rol" :value="__('Roles')" >Empresa Proveedora</h3>
            {{ Form::select('id_empresa', $empresas->pluck('nombre', 'id_empresa'), $bus->id_empresa, ['class' => 'form-control' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una empresa']) }}
            {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    <div class="box-footer mt20">
        <x-primary-button>{{ __('Aceptar cambios') }}</x-primary-button>
    </div>
</div>
</div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('placa') }}
            {{ Form::text('placa', $bus->placa, ['class' => 'form-control' . ($errors->has('placa') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aforo') }}
            {{ Form::number('aforo', $bus->aforo, ['class' => 'form-control' . ($errors->has('aforo') ? ' is-invalid' : ''), 'placeholder' => 'Aforo']) }}
            {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_empresa') }}
            {{ Form::select('id_empresa', $empresas->pluck('nombre', 'id_empresa'), $bus->id_empresa, ['class' => 'form-control' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una empresa']) }}
            {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
    </div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_bus') }}
            {{ Form::text('id_bus', $bus->id_bus, ['class' => 'form-control' . ($errors->has('id_bus') ? ' is-invalid' : ''), 'placeholder' => 'Id Bus']) }}
            {!! $errors->first('id_bus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('placa') }}
            {{ Form::text('placa', $bus->placa, ['class' => 'form-control' . ($errors->has('placa') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aforo') }}
            {{ Form::text('aforo', $bus->aforo, ['class' => 'form-control' . ($errors->has('aforo') ? ' is-invalid' : ''), 'placeholder' => 'Aforo']) }}
            {!! $errors->first('aforo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_empresa') }}
            {{ Form::text('id_empresa', $bus->id_empresa, ['class' => 'form-control' . ($errors->has('id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Id Empresa']) }}
            {!! $errors->first('id_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_chofer') }}
            {{ Form::text('id_chofer', $bus->id_chofer, ['class' => 'form-control' . ($errors->has('id_chofer') ? ' is-invalid' : ''), 'placeholder' => 'Id Chofer']) }}
            {!! $errors->first('id_chofer', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
    </div>
</div>
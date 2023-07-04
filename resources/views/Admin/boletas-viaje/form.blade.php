<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_boleta') }}
            {{ Form::text('id_boleta', $boletasViaje->id_boleta, ['class' => 'form-control' . ($errors->has('id_boleta') ? ' is-invalid' : ''), 'placeholder' => 'Id Boleta']) }}
            {!! $errors->first('id_boleta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario_pasajero') }}
            {{ Form::text('id_usuario_pasajero', $boletasViaje->id_usuario_pasajero, ['class' => 'form-control' . ($errors->has('id_usuario_pasajero') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario Pasajero']) }}
            {!! $errors->first('id_usuario_pasajero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario_chofer') }}
            {{ Form::text('id_usuario_chofer', $boletasViaje->id_usuario_chofer, ['class' => 'form-control' . ($errors->has('id_usuario_chofer') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario Chofer']) }}
            {!! $errors->first('id_usuario_chofer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_viaje') }}
            {{ Form::text('id_viaje', $boletasViaje->id_viaje, ['class' => 'form-control' . ($errors->has('id_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Id Viaje']) }}
            {!! $errors->first('id_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_viaje') }}
            {{ Form::text('fecha_viaje', $boletasViaje->fecha_viaje, ['class' => 'form-control' . ($errors->has('fecha_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Viaje']) }}
            {!! $errors->first('fecha_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_abordaje') }}
            {{ Form::text('hora_abordaje', $boletasViaje->hora_abordaje, ['class' => 'form-control' . ($errors->has('hora_abordaje') ? ' is-invalid' : ''), 'placeholder' => 'Hora Abordaje']) }}
            {!! $errors->first('hora_abordaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aforo_viaje') }}
            {{ Form::text('aforo_viaje', $boletasViaje->aforo_viaje, ['class' => 'form-control' . ($errors->has('aforo_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Aforo Viaje']) }}
            {!! $errors->first('aforo_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
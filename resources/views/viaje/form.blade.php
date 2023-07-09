<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_viaje') }}
            {{ Form::text('id_viaje', $viaje->id_viaje, ['class' => 'form-control' . ($errors->has('id_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Id Viaje']) }}
            {!! $errors->first('id_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_ruta') }}
            {{ Form::text('id_ruta', $viaje->id_ruta, ['class' => 'form-control' . ($errors->has('id_ruta') ? ' is-invalid' : ''), 'placeholder' => 'Id Ruta']) }}
            {!! $errors->first('id_ruta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_bus') }}
            {{ Form::text('id_bus', $viaje->id_bus, ['class' => 'form-control' . ($errors->has('id_bus') ? ' is-invalid' : ''), 'placeholder' => 'Id Bus']) }}
            {!! $errors->first('id_bus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_chofer') }}
            {{ Form::text('id_chofer', $viaje->id_chofer, ['class' => 'form-control' . ($errors->has('id_chofer') ? ' is-invalid' : ''), 'placeholder' => 'Id Chofer']) }}
            {!! $errors->first('id_chofer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_viaje') }}
            {{ Form::text('fecha_viaje', $viaje->fecha_viaje, ['class' => 'form-control' . ($errors->has('fecha_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Viaje']) }}
            {!! $errors->first('fecha_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_inicio') }}
            {{ Form::text('hora_inicio', $viaje->hora_inicio, ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Hora Inicio']) }}
            {!! $errors->first('hora_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_final') }}
            {{ Form::text('hora_final', $viaje->hora_final, ['class' => 'form-control' . ($errors->has('hora_final') ? ' is-invalid' : ''), 'placeholder' => 'Hora Final']) }}
            {!! $errors->first('hora_final', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $viaje->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aforo_actual') }}
            {{ Form::text('aforo_actual', $viaje->aforo_actual, ['class' => 'form-control' . ($errors->has('aforo_actual') ? ' is-invalid' : ''), 'placeholder' => 'Aforo Actual']) }}
            {!! $errors->first('aforo_actual', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_ruta') }}
            {{ Form::text('id_ruta', $ruta->id_ruta, ['class' => 'form-control' . ($errors->has('id_ruta') ? ' is-invalid' : ''), 'placeholder' => 'Id Ruta']) }}
            {!! $errors->first('id_ruta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_turno') }}
            {{ Form::text('id_turno', $ruta->id_turno, ['class' => 'form-control' . ($errors->has('id_turno') ? ' is-invalid' : ''), 'placeholder' => 'Id Turno']) }}
            {!! $errors->first('id_turno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('punto_inicial') }}
            {{ Form::text('punto_inicial', $ruta->punto_inicial, ['class' => 'form-control' . ($errors->has('punto_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Punto Inicial']) }}
            {!! $errors->first('punto_inicial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('punto_final') }}
            {{ Form::text('punto_final', $ruta->punto_final, ['class' => 'form-control' . ($errors->has('punto_final') ? ' is-invalid' : ''), 'placeholder' => 'Punto Final']) }}
            {!! $errors->first('punto_final', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
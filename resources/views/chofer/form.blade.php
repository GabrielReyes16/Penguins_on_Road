<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_chofer') }}
            {{ Form::text('id_chofer', $chofere->id_chofer, ['class' => 'form-control' . ($errors->has('id_chofer') ? ' is-invalid' : ''), 'placeholder' => 'Id Chofer']) }}
            {!! $errors->first('id_chofer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario') }}
            {{ Form::text('id_usuario', $chofere->id_usuario, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('licencia_conducir') }}
            {{ Form::text('licencia_conducir', $chofere->licencia_conducir, ['class' => 'form-control' . ($errors->has('licencia_conducir') ? ' is-invalid' : ''), 'placeholder' => 'Licencia Conducir']) }}
            {!! $errors->first('licencia_conducir', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
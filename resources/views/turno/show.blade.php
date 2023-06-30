@extends('layouts.app')

@section('template_title')
    {{ $turno->name ?? "{{ __('Show') Turno" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Turno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('turnos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Turno:</strong>
                            {{ $turno->id_turno }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $turno->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $turno->hora_inicio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

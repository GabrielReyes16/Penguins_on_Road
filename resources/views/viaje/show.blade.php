@extends('layouts.app')

@section('template_title')
    {{ $viaje->name ?? "{{ __('Show') Viaje" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Viaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('viajes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Viaje:</strong>
                            {{ $viaje->id_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Id Ruta:</strong>
                            {{ $viaje->id_ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Bus:</strong>
                            {{ $viaje->id_bus }}
                        </div>
                        <div class="form-group">
                            <strong>Id Chofer:</strong>
                            {{ $viaje->id_chofer }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Viaje:</strong>
                            {{ $viaje->fecha_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $viaje->hora_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Final:</strong>
                            {{ $viaje->hora_final }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $viaje->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Aforo Actual:</strong>
                            {{ $viaje->aforo_actual }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

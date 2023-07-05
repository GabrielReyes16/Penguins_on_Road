@extends('layouts.app')

@section('template_title')
    {{ $boletasViaje->name ?? "{{ __('Show') Boletas Viaje" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Boletas Viaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('boletas-viajes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Boleta:</strong>
                            {{ $boletasViaje->id_boleta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario Pasajero:</strong>
                            {{ $boletasViaje->id_usuario_pasajero }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario Chofer:</strong>
                            {{ $boletasViaje->id_usuario_chofer }}
                        </div>
                        <div class="form-group">
                            <strong>Id Viaje:</strong>
                            {{ $boletasViaje->id_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Viaje:</strong>
                            {{ $boletasViaje->fecha_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Abordaje:</strong>
                            {{ $boletasViaje->hora_abordaje }}
                        </div>
                        <div class="form-group">
                            <strong>Aforo Viaje:</strong>
                            {{ $boletasViaje->aforo_viaje }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $ruta->name ?? "{{ __('Show') Ruta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ruta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rutas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Ruta:</strong>
                            {{ $ruta->id_ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Turno:</strong>
                            {{ $ruta->id_turno }}
                        </div>
                        <div class="form-group">
                            <strong>Punto Inicial:</strong>
                            {{ $ruta->punto_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Punto Final:</strong>
                            {{ $ruta->punto_final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

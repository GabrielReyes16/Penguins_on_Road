@extends('layouts.app')

@section('template_title')
    {{ $bus->name ?? "{{ __('Show') Bus" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bus</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('buses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Bus:</strong>
                            {{ $bus->id_bus }}
                        </div>
                        <div class="form-group">
                            <strong>Placa:</strong>
                            {{ $bus->placa }}
                        </div>
                        <div class="form-group">
                            <strong>Aforo:</strong>
                            {{ $bus->aforo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Empresa:</strong>
                            {{ $bus->id_empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Id Chofer:</strong>
                            {{ $bus->id_chofer }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

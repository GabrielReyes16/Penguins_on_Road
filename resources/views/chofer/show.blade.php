@extends('layouts.app')

@section('template_title')
    {{ $chofere->name ?? "{{ __('Show') Chofere" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Chofere</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('choferes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Chofer:</strong>
                            {{ $chofere->id_chofer }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $chofere->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Licencia Conducir:</strong>
                            {{ $chofere->licencia_conducir }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

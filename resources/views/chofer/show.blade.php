<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Informacion de {{ $user->name }}
        </h2>
    </x-slot>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="color: white; text-align: center">
                    <div class="card-header">
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('choferes.index') }}" style="color: blue; text-decoration: underline;"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body" style="color: white;">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $user->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

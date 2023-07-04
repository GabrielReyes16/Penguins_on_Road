<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Registrar Bus
        </h2>
    </x-slot>
<x-guest-layout>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Bus</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.buses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bus.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
</x-app-layout>  

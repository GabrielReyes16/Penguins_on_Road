
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Editar información de {{ $user->name }}
        </h2>
    </x-slot>
    <section class="content container-fluid" style="text-align: center">
        <div class="card-header">
            <div class="">
                <a class="btn btn-primary" href="{{ route('users.index') }}" style="color: white; text-decoration: underline; background-color: blue"> {{ __('Back') }}</a>
            </div>
        </div>
        <div class="card" style="color: white;">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div style="text-align: center;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id_usuario) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                {{ Form::label('name') }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'style' => 'color:black']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('rol') }}
                                {{ Form::text('rol', $user->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Rol', 'style' => 'color:black']) }}
                                {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                    
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" style="color: rgb(0, 0, 0); text-decoration: underline; background-color: rgb(0, 255, 21);">{{ __('Enviar') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Registrar usuario
        </h2>
    </x-slot>
<x-guest-layout>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <h3 class="text-lg font-medium text-gray-200" for="name" :value="__('Nombres')" >Nombres</h3>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

       <!-- Email Address -->
       <div class="mt-4">
        <h3 class="text-lg font-medium text-gray-200" for="email" :value="__('Email')" >Email</h3>
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

        <!-- Rol -->
        <div class="mt-4">
            {!! Form::label('roles', 'Roles') !!}
            {!! Form::select('roles[]', $roles, null, ['class' => 'form-control']) !!}
        </div>


        <!-- Password -->
        <div class="mt-4">
            <h3 class="text-lg font-medium text-gray-200" for="password" :value="__('Contraseña')" >Contraseña</h3>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <h3 class="text-lg font-medium text-gray-200" for="password_confirmation" :value="__('Confirmar contraseña')" >Confirmar contraseña</h3>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
</x-app-layout>       
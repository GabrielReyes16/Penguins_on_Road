<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Editar información de {{ $user->name }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion de este usuario.") }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                    style="color: white;  background-color: blue;">
                    <a href="{{ route('admin.users.index') }}"> {{ __('Volver') }}</a>
                </div>
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-200">
                        {{ __('Datos de acceso') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                    </p>
                    {{-- Nombre del usuario --}}

                    <form method="post" action="{{ route('admin.users.update', $user->id_usuario) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Nombres')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                </div>
                </form>
                <br>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Listo') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Cambios guardados.') }}</p>
                    @endif
                </div>
                </form>
            </div>

            {{-- Rol del usuario --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-200">
                        {{ __('Gestionar roles (luego sera solo un rol)') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Este es el rol del usaurio. De acuerdo a ese rol, el usuario tiene ciertos permisos y denegaciones.') }}
                    </p>
                    <x-input-label for="name" :value="__('Rol')" />
                    {!! Form::model($user, ['route' => ['admin.users.updateRole', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $role)
                        <div>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </div>
                    @endforeach <br>
                    <x-primary-button>{{ __('Asignar rol') }}</x-primary-button>
                    {!! Form::close() !!}
                </div>
            </div>

            {{-- Password del usuario --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-200">
                        {{ __('Actuaizar contraseña') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Asignale al usuario una nueva contraseña.') }}
                    </p>
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" value="old('name', $user->password)"
                                name="current_password" type="password" class="mt-1 block w-full"
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('New Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div </x-app-layout>

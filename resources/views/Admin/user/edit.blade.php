<x-app-layout>
    <br>
    <div class="rectangulo"> Editando a: {{ $user->name }}</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
             <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;  background-color: blue;">
                <a  href="{{ route('admin.users.index') }}"> {{ __('Volver') }}</a>
            </div>
            <div class="p-4 sm:p-8 bg-gray-200 rounded-md sm">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-800">
                        {{ __('Nombre del usuario') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Asegurate de escribir correctamente el nombre del usuario.') }}
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
                <br>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="create">{{ __('Listo') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Cambios guardados.') }}</p>
                    @endif
                </div>
                </form>
            </div>
        </div> <br>



            {{-- Rol del usuario --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-gray-200 rounded-md sm">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-800">
                        {{ __('Gestionar rol del usuario') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Este es el rol del usuario. De acuerdo a ese rol, el usuario tiene ciertos permisos y denegaciones.') }}
                    </p>
                    <x-input-label for="name" :value="__('Roles')" />
                    {!! Form::model($user, ['route' => ['admin.users.updateRole', $user], 'method' => 'put']) !!}
                    <div >

                        {!! Form::select('roles[]', $roles->pluck('name', 'id'), $user->roles->pluck('id')->toArray(), [
                            'class' => 'form-control block mt-1 w-full',
                        ]) !!}
                    </div>
                    <br>
                    <div class="flex items-center justify-end mt-2">
                    <x-primary-button class="create">{{ __('Asignar rol') }}</x-primary-button>
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
            </div> <br>

            {{-- Password del usuario --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-gray-200 rounded-md sm">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-800">
                        {{ __('Actualizar contraseña') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Asignale al usuario una nueva contraseña.') }}
                    </p>
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Contraseña actual')" />
                            <x-text-input id="current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Nueva contraseña')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Confirmar contraseña')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="create">{{ __('Guardar') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
</x-app-layout>

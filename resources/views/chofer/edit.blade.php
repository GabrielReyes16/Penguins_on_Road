<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Editar información de {{ $user->name }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion del chofer.") }}
        </p>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-200">
                            {{ __('Datos de acceso') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-400">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
        <form method="post" action="{{ route('users.update', $user->id_usuario) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
    
            <div>
                <x-input-label for="name" :value="__('Nombres')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
    
            <div>
                <x-input-label for="rol" :value="__('Rol del usuario')" />
                <select id="rol" name="rol" class="mt-1 block w-full" required autofocus autocomplete="rol">
                    <option value="Administrador" {{ old('rol', $user->rol) === 'Administrador' ? 'selected' : '' }}>Admin</option>
                    <option value="Chofer" {{ old('rol', $user->rol) === 'Chofer' ? 'selected' : '' }}>Chofer</option>
                    <option value="Pasajero" {{ old('rol', $user->rol) === 'Pasajero' ? 'selected' : '' }}>Pasajero</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('rol')" />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Listo') }}</x-primary-button>
    
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Cambios guardados.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-200">
                        {{ __('Update Password') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                    </p>
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
    
            <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
</div

</x-app-layout>
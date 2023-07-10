<section>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-800">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Esta es la información de tu perfil.") }}
        </p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="mt-4">
        <label for="name" class="text-lg font-medium text-gray-700">Nombre</label>
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
            disabled autofocus autocomplete="name" />
        <x-input-error-create :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="mt-4">
        <label for="email" class="text-lg font-medium text-gray-700">Email</label>
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
            :value="$user->email" disabled autocomplete="email" />
        <x-input-error-create :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mt-4">
        <label for="roles" class="text-lg font-medium text-gray-700">Rol</label>
        <x-text-input id="rol" class="block mt-1 w-full" type="text" name="rol"
            :value="$user->roles()->first()->name" disabled autocomplete="rol" />
        <x-input-error-create :messages="$errors->get('rol')" class="mt-2" />
    </div>

        <div>
</section>

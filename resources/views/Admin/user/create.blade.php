<x-app-layout>
        <br>
        <div class="rectangulo"> {{ __('Crear un usuario') }}</div>
        <br>
        <div class="flex justify-center">
            <div class="crear_item">
              <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
          
                <div class="bg-gray-200 rounded-md p-4">
                  <div class="space-y-4">
                    <div>
                      <label for="name" class="text-lg font-medium text-gray-700">Nombre</label>
                      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                      <x-input-error-create :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                      <label for="email" class="text-lg font-medium text-gray-700">Email</label>
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                      <x-input-error-create :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                      <label for="roles" class="text-lg font-medium text-gray-700">Rol</label>
                      {!! Form::select('roles[]', $roles, null, ['class' => 'form-control block mt-1 w-full']) !!}
                    </div>
                    <hr class="border-gray-400">
                    <div>
                      <label for="password" class="text-lg font-medium text-gray-700">Contraseña</label>
                      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                      <x-input-error-passwd :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                      <label for="password_confirmation" class="text-lg font-medium text-gray-700">Confirmar contraseña</label>
                      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                      <x-input-error-passwd :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                  </div>
                  <div class="flex items-center justify-end mt-4">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-4"><a href="{{ route('admin.users.index') }}"> Volver</a></button>
                    <x-primary-button class="create">
                      {{ __('Registrar') }}
                    </x-primary-button>
                  </div>
                </div>
              </form>
            </div>
          </div> <br>
          
</x-app-layout>       
<x-app-layout>
    <br>
    <div class="rectangulo"> Informacion de {{ $user->name }}</div>
    <br>
    <div class="flex justify-center">
        <div class="bg-gray-200 rounded-md p-4">
            <div class="space-y-4">
                <div>
                    <label for="name" class="text-lg font-medium text-gray-700">Nombre</label>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                        disabled autofocus autocomplete="name" />
                    <x-input-error-create :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="email" class="text-lg font-medium text-gray-700">Email</label>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="$user->email" disabled autocomplete="email" />
                    <x-input-error-create :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <label for="roles" class="text-lg font-medium text-gray-700">Rol</label>
                    <x-text-input id="rol" class="block mt-1 w-full" type="text" name="rol"
                        :value="$user->roles()->first()->name" disabled autocomplete="rol" />
                    <x-input-error-create :messages="$errors->get('rol')" class="mt-2" />
                </div>
            </div>
        </div>
        </form>
    </div>
    </div> <br>

    <div>
        <div style="color: white;">
            <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded">
                <button class="create "><a href="{{ route('admin.users.index') }}"> Volver</a></button>

            </div>
        </div>
    </div>

</x-app-layout>

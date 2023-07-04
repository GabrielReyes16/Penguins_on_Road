<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Informacion de {{ $user->name }}
        </h2>
    </x-slot>

    <section class="content container-fluid" style="text-align: center">
        <div class="row">

            <div class="card" style="color: white;">
                <div class="card-header">
                    <div class=" d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                        style="color: white;  background-color: blue;">
                        <a href="{{ route('admin.users.index') }}"> {{ __('Volver') }}</a>
                    </div>
                </div>
                <br><br><br>
                <div class="flex justify-center">
                    <table id="users-table" class="min-w-full border border-gray-200 text-center">
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-b font-bold">ID</td>
                                <td class="px-4 py-2 border-b">{{ $user->id_usuario }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-b font-bold">Nombre</td>
                                <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td class="px-4 py-2 border-b font-bold">Email</td>
                                <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>

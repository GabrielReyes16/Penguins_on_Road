<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Usuarios') }}</div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">

                <form id="search-form" class="buscador" style=" text-align: center;">
                    <input id="search-input" type="text" placeholder="Buscar por nombre o email" class="mr-4 text-gray w-2/3">
                    <button id="clear-button" type="button"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Limpiar</button>
                </form>
                <div>
                    <br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                            >
                            <a href="{{ route('admin.users.create') }}"
                                class="create">
                                <i class="fa-sharp fa-light fa-plus"></i>   {{ __('Crear un usuario') }}
                            </a>
                        </div> <br>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="w-2/3 mx-auto mt-4">
                            <div class="bg-white text-black text-sm py-2 px-4 rounded">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @endif


                    <div class="flex justify-center" >
                        <div class="p-4">
                            <table id="users-table" class="min-w-full border border-gray-600">
                                <thead class="thead">
                                    <tr>
                                        <th class="py-2 px-4 border border-gray-600">ID</th>
                                        <th class="py-2 px-4 border border-gray-600">Nombre</th>
                                        <th class="py-2 px-4 border border-gray-600">Email</th>
                                        <th class="py-2 px-4 border border-gray-600">Rol</th>
                                        <th class="py-2 px-4 border border-gray-600">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="py-2 px-4 border border-gray-600">{{ $user->id_usuario }}</td>
                                            <td class="py-2 px-4 border border-gray-600 user-name">{{ $user->name }}</td>
                                            <td class="py-2 px-4 border border-gray-600 user-email">{{ $user->email }}</td>
                                            <td class="py-2 px-4 border border-gray-600 user-email">
                                                {{ $user->roles()->first()->name }}</td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <form action="{{ route('admin.users.destroy', $user->id_usuario) }}"
                                                    method="POST">
                                                    <a class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-3 rounded"
                                                        href="{{ route('admin.users.show', $user->id_usuario) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                    <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                                        href="{{ route('admin.users.edit', $user->id_usuario) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        var searchInput = document.getElementById('search-input');
        var clearButton = document.getElementById('clear-button');
        var rows = Array.from(document.querySelectorAll('#users-table tbody tr'));

        searchInput.addEventListener('input', function() {
            var searchValue = this.value.toLowerCase();

            rows.forEach(function(row) {
                var name = row.querySelector('.user-name').innerText.toLowerCase();
                var email = row.querySelector('.user-email').innerText.toLowerCase();

                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        clearButton.addEventListener('click', function() {
            searchInput.value = '';

            rows.forEach(function(row) {
                row.style.display = '';
            });
        });
    </script>

</x-app-layout>

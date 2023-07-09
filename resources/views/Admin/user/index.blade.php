<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Usuarios') }}</div>
    <br>
    <div class="container">
        <div class="container-sm">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <form id="search-form" class="buscador text-center">
                        <div class="input-group">
                            <input id="search-input" type="text" placeholder="Buscar por nombre o email"
                                class="form-control">
                            <button id="clear-button" type="button" class="btn btn-primary">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <div class="d-grid gap-6 col-8 mx-auto  text-white font-bold py-2  rounded">
                <a href="{{ route('admin.users.create') }}" class="create">
                    <i class="fa-sharp fa-light fa-plus"></i> {{ __('Crear un usuario') }}
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
        <div class="contenido-ticket">
        <div class="contenido-tabla">
            <table id="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr onclick="window.location='{{ route('admin.users.show', $user->id_usuario) }}';" style="cursor: pointer;">
                        <td>{{ $user->id_usuario }}</td>
                        <td class="user-name">{{ $user->name }}</td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td >
                            {{ $user->roles()->first()->name }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id_usuario) }}" method="POST">
                                <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('admin.users.edit', $user->id_usuario) }}"><i class="fa fa-fw fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>  
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

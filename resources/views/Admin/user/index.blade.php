<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <form id="search-form" class="mb-4" style=" text-align: center;">
                    <input id="search-input" type="text" placeholder="Buscar por nombre o email" class="mr-2 text-gray">
                    <button id="clear-button" type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Limpiar</button>
                </form>
                <div class="card" style="color: white;">
                    
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;  ;">
                                <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" >
                                  {{ __('Crear un usuario') }}
                                </a>
                              </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <div class="flex justify-center" style="color: white;">
                          <div class="p-4">
                              <table id="users-table" class="min-w-full border border-gray-200">
                                      <thead class="thead">
                                          <tr>
                                              <th class="py-2 px-4 border-b">ID</th>
                                              <th class="py-2 px-4 border-b">Nombre</th>
                                              <th class="py-2 px-4 border-b">Email</th>
                                              <th class="py-2 px-4 border-b">Operaciones</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($users as $user)
                                              <tr>
                                                  <td class="py-2 px-4 border-b">{{ $user->id_usuario }}</td>
                                                  <td class="py-2 px-4 border-b user-name">{{ $user->name }}</td>
                                                  <td class="py-2 px-4 border-b user-email">{{ $user->email }}</td>
                                                  <td class="py-2 px-4 border-b">
                                                      <form action="{{ route('admin.users.destroy',$user->id_usuario) }}" method="POST">
                                                          <a class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-3 rounded" href="{{ route('admin.users.show',$user->id_usuario) }}"> {{ __('Ver') }}</a>
                                                          <a  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('admin.users.edit',$user->id_usuario) }}" > {{ __('Editar') }}</a>
                                                          @csrf
                                                          @method('DELETE')
                                                          <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"> {{ __('Eliminar') }}</button>
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
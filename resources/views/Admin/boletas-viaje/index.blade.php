<x-app-layout>
    <br>
    <x-slot name="header" class="mt-4">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Boletas de viaje') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Boletas de viaje de los pasajeros que usaron el servicio.") }}
        </p>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <form id="search-form" class="mb-4" style=" text-align: center;">
                    <input id="search-input" type="text" placeholder="Buscar por nombre o email" class="mr-2 text-gray">
                    <button id="clear-button" type="button"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Limpiar</button>
                </form>
                <div class="card" style="color: white;">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded"
                            style="color: white;  ;">
                            <a href="{{ route('admin.users.create') }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                <i class="fa-sharp fa-light fa-plus"></i>   {{ __('Crear un usuario') }}
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="w-2/3 mx-auto">
                            <div class="bg-white text-black text-sm py-2 px-4 rounded">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Boleta</th>
										<th>Id Usuario Pasajero</th>
										<th>Id Usuario Chofer</th>
										<th>Id Viaje</th>
										<th>Fecha Viaje</th>
										<th>Hora Abordaje</th>
										<th>Aforo Viaje</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletas as $boleta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $boleta->id_boleta }}</td>
											<td>{{ $boleta->id_usuario_pasajero }}</td>
											<td>{{ $boleta->id_usuario_chofer }}</td>
											<td>{{ $boleta->id_viaje }}</td>
											<td>{{ $boleta->fecha_viaje }}</td>
											<td>{{ $boleta->hora_abordaje }}</td>
											<td>{{ $boleta->aforo_viaje }}</td>

                                            <td>
                                                <form action="{{ route('boletas-viajes.destroy',$boletasViaje->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('boletas-viajes.show',$boletasViaje->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('boletas-viajes.edit',$boletasViaje->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $boletas->links() !!}
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

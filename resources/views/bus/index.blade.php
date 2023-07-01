<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Buses') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card" style="color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;  background-color: blue;">
                                <a href="{{ route('buses.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" >
                                  {{ __('Crear un bus') }}
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
										<th class="py-2 px-4 border-b">Id Bus</th>
										<th class="py-2 px-4 border-b">Placa</th>
										<th class="py-2 px-4 border-b">Aforo</th>
										<th class="py-2 px-4 border-b">Id Empresa</th>
										<th class="py-2 px-4 border-b">Id Chofer</th>

                                        <th class="py-2 px-4 border-b">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $bus)
                                        <tr>
											<td class="py-2 px-4 border-b">{{ $bus->id_bus }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->placa }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->aforo }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->id_empresa }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->id_chofer }}</td>

                                            <td class="py-2 px-4 border-b">
                                                <form action="{{ route('buses.destroy',$bus->id_bus) }}" method="POST">
                                                    <a style="color: white;  background-color: rgb(46, 194, 83);" href="{{ route('buses.show',$bus->id_bus) }}">{{ __('Ver') }}</a>
                                                    <a style="color: rgb(0, 0, 0);  background-color: rgb(182, 221, 39);" href="{{ route('buses.edit',$bus->id_bus) }}">{{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $buses->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>

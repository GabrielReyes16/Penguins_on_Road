<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Buses') }}</div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card" >
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;">
                                <a href="{{ route('admin.buses.create') }}" class="create" >
                                    <i class="fa-sharp fa-light fa-plus"></i>   {{ __('Crear un bus') }}
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

                    <div class="flex justify-center">
                        <div class="p-4">
                            <table id="users-table" class="min-w-full border border-gray-200">
                                    <thead class="thead">
                                    <tr>
										<th class="py-2 px-4 border border-gray-600">Id Bus</th>
										<th class="py-2 px-4 border border-gray-600">Placa</th>
										<th class="py-2 px-4 border border-gray-600">Aforo</th>
										<th class="py-2 px-4 border border-gray-600">Empresa</th>

                                        <th class="py-2 px-4 border border-gray-600">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $bus)
                                        <tr>
											<td class="py-2 px-4 border border-gray-600">{{ $bus->id_bus }}</td>
											<td class="py-2 px-4 border border-gray-600">{{ $bus->placa }}</td>
											<td class="py-2 px-4 border border-gray-600">{{ $bus->aforo }}</td>
											<td class="py-2 px-4 border border-gray-600">{{ $bus->empresa->nombre }}</td>


                                            <td class="py-2 px-4 border border-gray-600">
                                                <form action="{{ route('admin.buses.destroy',$bus->id_bus) }}" method="POST">
                                                    <a class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-3 rounded" href="{{ route('admin.buses.show',$bus->id_bus) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                                    <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('admin.buses.edit',$bus->id_bus) }}"><i
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
                </div>
                {!! $buses->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>

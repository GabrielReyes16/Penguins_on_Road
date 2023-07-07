<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Buses') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Buses con los que el servicio cuenta.") }}
        </p>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card" style="color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;">
                                <a href="{{ route('admin.buses.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" >
                                    <i class="fa-sharp fa-light fa-plus"></i>   {{ __('Crear un bus') }}
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
										<th class="py-2 px-4 border-b">Empresa</th>

                                        <th class="py-2 px-4 border-b">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $bus)
                                        <tr>
											<td class="py-2 px-4 border-b">{{ $bus->id_bus }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->placa }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->aforo }}</td>
											<td class="py-2 px-4 border-b">{{ $bus->empresa->nombre }}</td>


                                            <td class="py-2 px-4 border-b">
                                                <form action="{{ route('admin.buses.destroy',$bus->id_bus) }}" method="POST">
                                                    <a class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-3 rounded" href="{{ route('admin.buses.show',$bus->id_bus) }}"><i
                                                        class="fa fa-fw fa-eye"></i> </a>
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

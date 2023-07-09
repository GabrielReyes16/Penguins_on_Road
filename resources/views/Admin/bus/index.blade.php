<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Buses') }}</div>
    <br>
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <div class="d-grid gap-6 col-8 mx-auto  text-white font-bold py-2  rounded">
                <a href="{{ route('admin.buses.create') }}" class="create">
                    <i class="fa-sharp fa-light fa-plus"></i> {{ __('Crear un bus') }}
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
                        <table >
                            <thead class="thead">
                                <tr>
                                    <th>Id Bus</th>
                                    <th>Placa</th>
                                    <th>Aforo</th>
                                    <th>Empresa</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buses as $bus)
                                    <tr onclick="window.location='{{ route('admin.buses.show', $bus->id_bus) }}';"
                                        style="cursor: pointer;">
                                        <td>{{ $bus->id_bus }}</td>
                                        <td>{{ $bus->placa }}</td>
                                        <td>{{ $bus->aforo }}</td>
                                        <td>{{ $bus->empresa->nombre }}</td>
                                        <td>
                                            <form action="{{ route('admin.buses.destroy', $bus->id_bus) }}"
                                                method="POST">
                                                <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                                    href="{{ route('admin.buses.edit', $bus->id_bus) }}"><i
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
                {!! $buses->links() !!}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

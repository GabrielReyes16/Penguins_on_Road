<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Choferes') }}</div>
    <br>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="w-2/3 mx-auto mt-4">
                <div class="bg-white text-black text-sm py-2 px-4 rounded">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif
        <div class="contenido-ticket">
        <div class="contenido-tabla">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Bus</th>
                        <th>Empresa</th>
                        <th>Licencia</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($choferes as $chofer)
                    <tr onclick="window.location='{{ route('admin.choferes.show', $chofer->id_chofer) }}';" style="cursor: pointer;">
                            <td>{{ $chofer->id_chofer }}</td>
                            <td>{{ $chofer->user->name }}</td>
                            <td>{{ optional($chofer->bus)->placa ?? 'Sin bus' }}</td>
                            <td>{{ optional($chofer->empresa)->nombre ?? 'Sin empresa' }}</td>
                            <td>{{ $chofer->licencia_conducir }}</td>
                            <td>{{ $chofer->estado }}</td>
                        <td>
                            <form action="{{ route('admin.choferes.edit', $chofer->id_chofer) }}" method="GET">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('admin.choferes.edit', $chofer->id_chofer) }}"><i class="fa fa-fw fa-edit"></i></button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>  
        </div>
        {!! $choferes->links() !!}
    </div>
    </div>
</x-app-layout>
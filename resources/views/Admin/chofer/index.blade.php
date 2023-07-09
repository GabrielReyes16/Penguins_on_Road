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
                        <th>Opciones</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($choferes as $chofer)
                        <tr>
                            <td>{{ $chofer->id_chofer }}</td>
                            <td>{{ $chofer->user->name }}</td>
                            <td>{{ $chofer->bus->placa }}</td>
                            <td>{{ $chofer->empresa->nombre }}</td>
                            <td>{{ $chofer->licencia_conducir }}</td>
                        <td>
                            <form action="{{ route('admin.choferes.destroy', $chofer->id_chofer) }}" method="POST">
                                <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('admin.choferes.edit', $chofer->id_chofer) }}"><i class="fa fa-fw fa-edit"></i></a>
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
</x-app-layout>
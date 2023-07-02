<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Turnos') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="color: white;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="d-grid gap-2 col-6 mx-auto" style="color: white; text-decoration: underline; background-color: blue;">
                           <a href="{{ route('turnos.create') }}"  >
                             {{ __('Crear un turno') }}
                           </a>
                         </div>
                   </div>


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="flex justify-center">
                        <div class="p-4">
                            <table class="min-w-full border border-gray-200">
                                <thead class="thead">
                                    <tr>   
										<th class="py-2 px-4 border-b">Id Turno</th>
										<th class="py-2 px-4 border-b">Nombre</th>
										<th class="py-2 px-4 border-b">Hora Inicio</th>

                                        <th class="py-2 px-4 border-b"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($turnos as $turno)
                                        <tr>   
											<td class="py-2 px-4 border-b">{{ $turno->id_turno }}</td>
											<td class="py-2 px-4 border-b">{{ $turno->nombre }}</td>
											<td class="py-2 px-4 border-b">{{ $turno->hora_inicio }}</td>

                                            <td class="py-2 px-4 border-b">
                                                <form action="{{ route('turnos.destroy',$turno->id_turno) }}" method="POST">
                                                    <a class="bg-yellow-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" href="{{ route('turnos.show',$turno->id_turno) }}">{{ __('Ver') }}</button>
                                                    <a class="bg-white-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('turnos.update',$turno->id_turno) }}"> {{ __('Editar') }}</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded"> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $turnos->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>

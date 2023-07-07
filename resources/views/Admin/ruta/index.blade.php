<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Rutas
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Estas son las rutas disponibles .") }}
        </p>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card" style="color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="d-grid gap-2 col-6 mx-auto text-white font-bold py-2 px-4 rounded" style="color: white;">
                                <a href="{{ route('admin.rutas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" >
                                    <i class="fa-sharp fa-light fa-plus"></i>   {{ __('Crear una ruta') }}
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

                    <div class="flex justify-center" style="color: white;">
                        <div class="p-4">
                            <table id="users-table" class="min-w-full border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">Id ruta</th>
                                        <th class="py-2 px-4 border-b">Turno</th>
                                        <th class="w-1/2 border-b">Punto inicial</th>
                                        <th class="w-1/2 border-b">Punto final</th>
                                        <th class="w-1/2  border-b">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <td>{{ $ruta->id_ruta }}</td>
                                            <td>{{ $ruta->turno->nombre }}</td>
                                            <td class="w-1/4">{{ $ruta->punto_inicial }}</td>
                                            <td class="w-1/4">{{ $ruta->punto_final }}</td>
                                            <td>
                                                <form action="{{ route('admin.rutas.destroy',$ruta->id_ruta) }}" method="POST">
                                                    <div class="flex gap-2">
                                                        <a class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-3 rounded" href="{{ route('admin.rutas.show',$ruta->id_ruta) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('admin.rutas.edit',$ruta->id_ruta) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"><i class="fa fa-fw fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rutas->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>

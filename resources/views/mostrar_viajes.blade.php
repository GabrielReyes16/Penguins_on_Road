<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('crear_viaje') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear Viaje
                        </a>
                    </div>

                    <h4 class="text-lg text-gray-800 font-semibold mb-4">Lista de Viajes:</h4>

                    <ul>
                        @foreach ($viajes as $viaje)
                            <li class="bg-slate-900 p-4 rounded-lg mb-4 flex items-center justify-between">
                                <span class="w-1/5">{{ $viaje->fecha_viaje }}</span>
                                <span class="w-1/5">{{ $viaje->ruta->punto_inicial }}</span>
                                <a href="#" class="w-1/5 flex items-center justify-center text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-qrcode mr-2"></i>
                                    Escaner
                                </a>
                                <select class="w-1/5 border border-gray-300 rounded-lg p-2">
                                    <option value="activo">Activo</option>
                                    <option value="no-activo">No activo</option>
                                </select>
                                <div class="w-1/5 flex items-center justify-end space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

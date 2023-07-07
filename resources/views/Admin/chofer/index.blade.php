<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            {{ __('Choferes') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div style="color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
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
                                              <th class="py-2 px-4 border-b">ID</th>
                                              <th class="py-2 px-4 border-b">Nombre</th>
                                              <th class="py-2 px-4 border-b">Email</th>
                                              <th class="py-2 px-4 border-b">Bus</th>
                                              <th class="py-2 px-4 border-b">Empresa</th>
                                              <th class="py-2 px-4 border-b">Licencia</th>
                                              <th class="py-2 px-4 border-b">Opciones</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($choferes as $chofer)
                                              <tr>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->id_chofer }}</td>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->user->name }}</td>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->user->email }}</td>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->bus->placa }}</td>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->empresa->nombre }}</td>
                                                  <td class="py-2 px-4 border-b">{{ $chofer->licencia_conducir }}</td>
                      
                                                  <td class="py-2 px-4 border-b">
                                                      <form action="{{ route('admin.choferes.destroy',$chofer->id_chofer) }}" method="POST">
                                                        <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('admin.choferes.edit',$chofer->id_chofer) }}" ><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
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
                          {!! $choferes->links() !!}
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
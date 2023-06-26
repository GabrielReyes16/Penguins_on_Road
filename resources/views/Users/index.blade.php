<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a type="button" href="{{ route('user.create') }}" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold 
                                                                                    hover:bg-indigo-800 duration-200 each-in-out height:6px">Crear</a>
                <table class="table-fixed w-full">
                    <thead>
                        <tr clsss="bg-gray-300 text-white">
                            <th class="border px4 py-2" style="display: none">ID</th>
                            <th class="border px4 py-2">NOMBRE</th>
                            <th class="border px4 py-2">ROL</th>

                            <th class="border px4 py-2">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="text-align:center; display:none">{{ $user->id }}</td>
                            <td style="text-align:center">{{ $user->name }}</td>
                            <td style="text-align:center">{{ $user->rol }}</td>
                            <td class="border px-4 py2">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- boton editar -->
                                    <a href="{{ route('productos.edit', $user->id) }}" class="bg-gray-900 hover:bg-gray-400 rounded 
                                                                                                        text-white font-bold py-2 px-4">Editar</a>
                                    <!-- boton borrar -->
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-200 rounded text-white font-bold py-2 px-4 m-md">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                    <div>
                        {!! $usuarios->links() !!}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    (function (){
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
           .forEach(function (form) {
              form.addEventListener('submit', function(event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirma la eliminacion del usuario?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                  }).then((result) => {
                    if(result.isConfirmed) {
                        //Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                        this.submit();
                    }
                  })    
              }, false)
           })
    })()
</script>
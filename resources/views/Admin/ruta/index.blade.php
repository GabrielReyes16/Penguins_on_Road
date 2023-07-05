<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200  leading-tight">
            Rutas
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("\n Edita la informacion de este usuario.") }}
        </p>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ruta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.rutas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Ruta') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Ruta</th>
										<th>Id Turno</th>
										<th>Punto Inicial</th>
										<th>Punto Final</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ruta->id_ruta }}</td>
											<td>{{ $ruta->id_turno }}</td>
											<td>{{ $ruta->punto_inicial }}</td>
											<td>{{ $ruta->punto_final }}</td>

                                            <td>
                                                <form action="{{ route('admin.rutas.destroy',$ruta->id_ruta) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.rutas.show',$ruta->id_ruta) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.rutas.edit',$ruta->id_ruta) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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

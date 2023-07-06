@extends('layouts.app')

@section('template_title')
    Boletas Viaje
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Boletas Viaje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('boletas-viajes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Id Boleta</th>
										<th>Id Usuario Pasajero</th>
										<th>Id Usuario Chofer</th>
										<th>Id Viaje</th>
										<th>Fecha Viaje</th>
										<th>Hora Abordaje</th>
										<th>Aforo Viaje</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletasViajes as $boletasViaje)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $boletasViaje->id_boleta }}</td>
											<td>{{ $boletasViaje->id_usuario_pasajero }}</td>
											<td>{{ $boletasViaje->id_usuario_chofer }}</td>
											<td>{{ $boletasViaje->id_viaje }}</td>
											<td>{{ $boletasViaje->fecha_viaje }}</td>
											<td>{{ $boletasViaje->hora_abordaje }}</td>
											<td>{{ $boletasViaje->aforo_viaje }}</td>

                                            <td>
                                                <form action="{{ route('boletas-viajes.destroy',$boletasViaje->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('boletas-viajes.show',$boletasViaje->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('boletas-viajes.edit',$boletasViaje->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $boletasViajes->links() !!}
            </div>
        </div>
    </div>
@endsection

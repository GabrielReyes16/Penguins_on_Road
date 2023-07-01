@extends('layouts.app')

@section('template_title')
    Bus
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bus') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('buses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Bus</th>
										<th>Placa</th>
										<th>Aforo</th>
										<th>Id Empresa</th>
										<th>Id Chofer</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $bus)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bus->id_bus }}</td>
											<td>{{ $bus->placa }}</td>
											<td>{{ $bus->aforo }}</td>
											<td>{{ $bus->id_empresa }}</td>
											<td>{{ $bus->id_chofer }}</td>

                                            <td>
                                                <form action="{{ route('buses.destroy',$bus->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('buses.show',$bus->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('buses.edit',$bus->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $buses->links() !!}
            </div>
        </div>
    </div>
@endsection

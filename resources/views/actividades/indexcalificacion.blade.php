@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Actividades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-actividade')
                        <a class="btn btn-warning" href="{{ route('actividades.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">archivo</th>
                                    <th style="color:#fff;">calificacion</th>
                                    <th style="color:#fff;">id usuario</th>                                     
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($entregadeactividades as $entregadeactividade)
                            <tr>
                                    @foreach ($users as $user)
                                        @if($user->name == \Illuminate\Support\Facades\Auth::user()->name)
                                                
                                                    <td style="display: none;">{{ $entregadeactividade->id }}</td>                                
                                                    <td>{{ $entregadeactividade->archivo }}</td>
                                                    <td>{{ $entregadeactividade->calificacion }}</td>
                                                    <td>{{ $entregadeactividade->user_id }}</td>
                                        @endif
                                     @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $entregadeactividades->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

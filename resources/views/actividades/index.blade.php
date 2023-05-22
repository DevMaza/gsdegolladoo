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
                            {{-- comment  @foreach ($users as $user)
                                 {{$user->name}}
                            @endforeach --}}
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Descripcion</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($actividades as $actividade)
                            <tr>
                                    @foreach ($users as $user)
                                        @if($user->name == \Illuminate\Support\Facades\Auth::user()->name)
                                                @if($actividade->grupo_id  == $user->grupo_id)           
                                                    <td style="display: none;">{{ $actividade->id }}</td>                                
                                                    <td>{{ $actividade->titulo }}</td>
                                                    <td>{{ $actividade->descripcion }}</td>
                                                    <td>
                                                        <form action="{{ route('actividades.destroy',$actividade->id) }}" method="POST">                                        
                                                            @can('editar-actividade')
                                                            <a class="btn btn-info" href="{{ route('actividades.edit',$actividade->id) }}">Editar</a>
                                                            @endcan

                                                            @can('ver-actividade')
                                                            <a class="btn btn-success" href="{{ route('actividades.show',$actividade->id) }}">ver</a>
                                                            @endcan

                                                            @can('calificar-actividade')
                                                            <a class="btn btn-success" href="{{ route('entregadeactividades.index',$actividade->id) }}">calificar</a>
                                                            @endcan

                                                            @csrf
                                                            @method('DELETE')
                                                            @can('borrar-actividade')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                 @endif
                                        @endif
                                     @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $actividades->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

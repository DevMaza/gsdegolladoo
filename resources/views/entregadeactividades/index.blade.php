@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Actividades Entregadas</h3>
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
                                    <th style="color:#fff;">Nombre</th>                                     
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($entregadeactividades as $entregadeactividade)
                            <tr>
                                    @foreach ($users as $user)
                                            @if($user->id == $entregadeactividade->user_id )
                                                {{$namex=$user->name}}
                                            @endif                                       
                                            @if($user->name == \Illuminate\Support\Facades\Auth::user()->name) 
                                                 @if($entregadeactividade->actividade_id == $idact)
                                                    <td style="display: none;">{{ $entregadeactividade->id }}</td>                                
                                                    <td><a href="{{ route('descarga.download',$entregadeactividade->uuid)}}">{{$entregadeactividade->archivo}}</a></td>
                                                    <td><input type="text" name="calificacion" value={{$entregadeactividade->calificacion}}></td>
                                                    <td>{{ $namex }}</td>
                                                    <td>
                                                        <form action="{{ route('entregadeactividades.destroy',$entregadeactividade->actividade_id) }}" method="POST">                                        
                                                            @can('editar-actividade')
                                                            <a class="btn btn-info" href="{{ route('entregadeactividades.edit',$entregadeactividade->actividade_id) }}">Editar</a>
                                                            @endcan

                                                            @can('ver-actividade')
                                                            <a class="btn btn-success" href="{{ route('entregadeactividades.show',$entregadeactividade->actividade_id) }}">ver</a>
                                                            @endcan

                                                            @can('calificar-actividade')
                                                            <a class="btn btn-success" href="{{ route('entregadeactividades.index',$entregadeactividade->actividade_id) }}">calificar</a>
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
                            {!! $entregadeactividades->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

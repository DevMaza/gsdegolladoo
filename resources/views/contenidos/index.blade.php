@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contenidos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-contenido')
                        <a class="btn btn-warning" href="{{ route('contenidos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Materia</th>                                    
                                    <th style="color:#fff;">Acciones</th>
                                    @role('administrador|Docente')
                                    <th style="color:#fff;">Imagen</th>
                                    @endrole                                                                       
                              </thead>
                              <tbody>
                            @foreach ($contenidos as $contenido)
                            <tr>
                                @foreach ($users as $user)
                                    @if($user->name == \Illuminate\Support\Facades\Auth::user()->name)
                                            @if($contenido->grupo_id  == $user->grupo_id)                                
                                                <td style="display: none;">{{ $contenido->id }}</td>                                
                                                <td>{{ $contenido->titulo }}</td>
                                                <td>{{ $contenido->contenido }}</td>
                                                @foreach($materias as $materia)
                                                    @if($contenido->materia_id == $materia->id)
                                                        <td>{{ $materia->materia }}</td>
                                                    @endif
                                                @endforeach
                                                <td>
                                                    <form action="{{ route('contenidos.destroy',$contenido->id) }}" method="POST">                                        
                                                        @can('editar-contenido')
                                                        <a class="btn btn-info" href="{{ route('contenidos.edit',$contenido->id) }}">Editar</a>
                                                        @endcan

                                                                        @can('ver-contenido')
                                                                        <a class="btn btn-success" href="{{ route('contenidos.show',$contenido->id) }}">ver</a>
                                                                        @endcan


                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-contenido')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                                @role('administrador|Docente')
                                                <td><img height="100px"  src="{{asset('storage'.'/'.$contenido->imagen)}}" alt="{{$contenido->title}}"class="img-fluid" width="100px"></td>	
                                                @endrole
                                        @endif
                                    @endif
                             @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $contenidos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

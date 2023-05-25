@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Materias</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-grupo')
                        <a class="btn btn-warning" href="{{ route('materias.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Materia</th>
                                    <th style="color:#fff;">Acciones</th>                                                                  
                              </thead>
                              <tbody>
                            @foreach ($materias as $materia)
                            <tr>
                                <td style="display: none;">{{ $materia->id }}</td>                                
                                <td>{{ $materia->materia }}</td>
                                <td>
                                    <form action="{{ route('materias.destroy',$materia->id) }}" method="POST">                                        
                                        @can('editar-materia')
                                        <a class="btn btn-info" href="{{ route('materias.edit',$materia->id) }}">Editar</a>
                                        @endcan

                                        @can('ver-materia')
                                        <a class="btn btn-success" href="{{ route('materias.show',$materia->id) }}">ver</a>
                                        @endcan


                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-materia')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                                

                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $materias->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

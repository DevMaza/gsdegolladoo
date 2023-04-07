@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Grupos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-grupo')
                        <a class="btn btn-warning" href="{{ route('grupos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Grado</th>
                                    <th style="color:#fff;">Periodo</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($grupos as $grupo)
                            <tr>
                                <td style="display: none;">{{ $grupo->id }}</td>                                
                                <td>{{ $grupo->grado }}</td>
                                <td>{{ $grupo->periodo }}</td>
                                <td>
                                    <form action="{{ route('grupos.destroy',$grupo->id) }}" method="POST">                                        
                                        @can('editar-grupo')
                                        <a class="btn btn-info" href="{{ route('grupos.edit',$grupo->id) }}">Editar</a>
                                        @endcan

                                        @can('ver-grupo')
                                        <a class="btn btn-success" href="{{ route('grupos.show',$grupo->id) }}">ver</a>
                                        @endcan


                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-grupo')
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
                            {!! $grupos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

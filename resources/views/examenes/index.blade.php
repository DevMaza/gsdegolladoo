@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Examenes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-examen')
                        <a class="btn btn-warning" href="{{ route('examenes.create') }}">Nuevo</a>
                        @endcan
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Título</th>
                                <th style="color:#fff;">Descripción</th>                                                                  
                                <th style="color:#fff;">Grupo</th>                                                                  
                                <th style="color:#fff;">Materia</th>                                                                  
                                <th style="color:#fff;">Acciones</th>                                                                  
                            </thead>
                            <tbody>
                                @foreach ($examenes as $examen)
                                <tr>
                                    <td style="display: none;">{{ $examen->id }}</td>                                
                                    <td>{{ $examen->titulo }}</td>
                                    <td>{{ $examen->descripcion }}</td>
                                    <td>{{ $examen->grupo->grado }}</td>
                                    <td>{{ $examen->materia->materia }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @canany(['ver-pregunta', 'crear-pregunta', 'editar-pregunta', 'borrar-pregunta'])
                                            <a class="btn btn-primary mr-2" href="{{ route('preguntas.index', ['examen' => $examen->id]) }}">Preguntas</a>
                                            @endcanany
                                            @can('editar-examen')
                                            <a class="btn btn-info mr-2" href="{{ route('examenes.edit', $examen->id) }}">Editar</a>
                                            @endcan
                                            @can('ver-examen')
                                            <a class="btn btn-success mr-2" href="{{ route('examenes.show', $examen->id) }}">ver</a>
                                            @endcan
                                            @can('borrar-examen')
                                            <form action="{{ route('examenes.destroy',$examen->id) }}" method="POST">                                        
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $examenes->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

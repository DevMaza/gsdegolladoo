@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">Preguntas del examen <a class="text-primary" href="{{route('examenes.show', ['examen' => $examen->id])}}">{{$examen->titulo}}</a></h3>
        <a href="{{route('examenes.index')}}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-pregunta')
                        <a class="btn btn-warning" href="{{ route('preguntas.create', ['examen' => $examen]) }}">Nuevo</a>
                        @endcan
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Pregunta</th>
                                <th style="color:#fff;">Opción A</th>                                                                  
                                <th style="color:#fff;">Opción B</th>                                                                  
                                <th style="color:#fff;">Opción C</th>                                                                  
                                <th style="color:#fff;">Opción Correcta</th>                                                                  
                                <th style="color:#fff;">Acciones</th>                                                                  
                            </thead>
                            <tbody>
                                @foreach ($preguntas as $pregunta)
                                <tr>
                                    <td style="display: none;">{{ $pregunta->id }}</td>                                
                                    <td>{{ $pregunta->pregunta }}</td>
                                    <td>{{ $pregunta->opcion_a }}</td>
                                    <td>{{ $pregunta->opcion_b }}</td>
                                    <td>{{ $pregunta->opcion_c }}</td>
                                    <td>{{ $pregunta->correcta }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @can('editar-pregunta')
                                            <a class="btn btn-info mr-2" href="{{ route('preguntas.edit',$pregunta->id) }}">Editar</a>
                                            @endcan
                                            @can('ver-pregunta')
                                            <a class="btn btn-success mr-2" href="{{ route('preguntas.show',$pregunta->id) }}">ver</a>
                                            @endcan
                                            @can('borrar-pregunta')
                                            <form action="{{ route('preguntas.destroy',$pregunta->id) }}" method="POST">                                        
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
                            {!! $preguntas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

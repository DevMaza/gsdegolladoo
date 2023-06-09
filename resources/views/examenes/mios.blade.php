@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mis Examenes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Título</th>
                                <th style="color:#fff;">Descripción</th>
                                <th style="color:#fff;">Materia</th>
                                <th style="color:#fff;">Calificación</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($examenes as $examen)
                                <tr>
                                    <td>{{ $examen->titulo }}</td>
                                    <td>{{ $examen->descripcion }}</td>
                                    <td>{{ $examen->materia->materia }}</td>
                                    <td>
                                        <span class="badge @if(!$examen->realizado || $examen->calificacion < 6) badge-danger @else badge-primary @endif">
                                            {{$examen->calificacion}}
                                        </span>
                                    </td>
                                    <td>
                                        @if(!$examen->realizado)
                                        <div class="d-flex">
                                            <a class="btn btn-success mr-2" href="{{ route('realizar-examen', $examen->id) }}">Hacer Examen</a>
                                        </div>
                                        @endif
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

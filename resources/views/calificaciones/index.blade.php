@extends('layouts.app')

@section('content')
@can('ver-calificaciones-grupo')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">PROMEDIO GENERAL</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Alumno</th>
                                @foreach($materias as $materia)
                                <th style="color:#fff;">{{$materia->materia}}</th>
                                @endforeach
                                <th style="color:#fff;">PROMEDIO</th>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}} {{$usuario->apellido}}</td>
                                    @foreach($materias as $materia)
                                    <td>{{ $promedios[$usuario->id][$materia->id] }}</td>
                                    @endforeach
                                    <td>{{ round($promedios[$usuario->id]->sum() / ($materias->count() > 0 ? $materias->count() : 1), 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($materias as $materia)
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Calificaciones {{$materia->materia}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Alumno</th>
                                <th style="color:#fff;">Promedio</th>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}} {{$usuario->apellido}}</td>
                                    <td>{{ $promedios[$usuario->id][$materia->id] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endcan
@can('ver-calificaciones-mias')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">MI PROMEDIO GENERAL</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                @foreach($materias as $materia)
                                <th style="color:#fff;">{{$materia->materia}}</th>
                                @endforeach
                                <th style="color:#fff;">PROMEDIO</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($materias as $materia)
                                    <td>{{ $promedios[$user->id][$materia->id] }}</td>
                                    @endforeach
                                    <td>{{ round($promedios[$user->id]->sum() / ($materias->count() > 0 ? $materias->count() : 1), 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($materias as $materia)
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{$materia->materia}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Tipo</th>
                                <th style="color:#fff;">Titulo</th>
                                <th style="color:#fff;">Calificación</th>
                            </thead>
                            <tbody>
                                @foreach ($actividadesPorMateria[$materia->id] as $actividad)
                                <tr>
                                    <td>ACTIVIDAD</td>
                                    <td>{{ $actividad->titulo }}</td>
                                    <td>
                                        <span class="badge @if(!$actividad->realizado || $actividad->calificacion < 6) badge-danger @else badge-primary @endif">
                                            {{$actividad->calificacion}}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach ($examenesPorMateria[$materia->id] as $examen)
                                <tr>
                                    <td>EXAMEN</td>
                                    <td>{{ $examen->titulo }}</td>
                                    <td>
                                        <span class="badge @if(!$examen->realizado || $examen->calificacion < 6) badge-danger @else badge-primary @endif">
                                            {{$examen->calificacion}}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-right" colspan="2">PROMEDIO</td>
                                    <td>{{
                                        $promedios[$user->id][$materia->id]
                                    }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endcan
@endsection

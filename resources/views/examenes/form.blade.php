@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">@if(isset($examen)) Editar @else Crear @endif Examen</h3>
        <a href="{{route('examenes.index')}}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">     
                        @if ($errors->any())                                                
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                            @foreach ($errors->all() as $error)                                    
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(isset($examen))
                        <form action="{{ route('examenes.update', ['examen' => $examen->id]) }}" method="POST">
                            @method('PUT')
                        @else
                        <form action="{{ route('examenes.store') }}" method="POST">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="titulo">Ingrese titulo del examen</label>
                                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{isset($examen)?$examen->titulo:''}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Ingrese la descripción del examen</label>
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{isset($examen)?$examen->descripcion:''}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="materia_id">Seleccione la materia</label>
                                        <select id="materia_id" name="materia_id" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}" @if(isset($examen) && $materia->id == $examen->materia_id) selected @endif>{{$materia->materia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

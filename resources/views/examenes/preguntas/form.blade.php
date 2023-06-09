@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">@if(isset($pregunta)) Editar @else Crear @endif Pregunta</h3>
        <a href="{{route('preguntas.index', ['examen' => $examen->id])}}" class="btn btn-secondary">Regresar</a>
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
                        @if(isset($pregunta))
                        <form action="{{ route('preguntas.update', ['pregunta' => $pregunta->id]) }}" method="POST">
                            @method('PUT')
                        @else
                        <form action="{{ route('preguntas.store', ['examen' => $examen->id]) }}" method="POST">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="pregunta">Ingrese la pregunta</label>
                                        <input type="text" id="pregunta" name="pregunta" class="form-control" value="{{old('pregunta', isset($pregunta)?$pregunta->pregunta:'')}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="opcion_a">Ingrese la Opción A de la pregunta</label>
                                        <input type="text" id="opcion_a" name="opcion_a" class="form-control" value="{{old('opcion_a', isset($pregunta)?$pregunta->opcion_a:'')}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="opcion_b">Ingrese la Opción B de la pregunta</label>
                                        <input type="text" id="opcion_b" name="opcion_b" class="form-control" value="{{old('opcion_b', isset($pregunta)?$pregunta->opcion_b:'')}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="opcion_c">Ingrese la Opción C de la pregunta</label>
                                        <input type="text" id="opcion_c" name="opcion_c" class="form-control" value="{{old('opcion_c', isset($pregunta)?$pregunta->opcion_c:'')}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="correcta">Seleccione la opción correcta</label>
                                        <select id="correcta" name="correcta" class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="a" @if(old('correcta') == 'a' || (old('correcta') == '' && isset($pregunta) && $pregunta->correcta == 'a')) selected @endif>Opción A</option>
                                            <option value="b" @if(old('correcta') == 'b' || (old('correcta') == '' && isset($pregunta) && $pregunta->correcta == 'b')) selected @endif>Opción B</option>
                                            <option value="c" @if(old('correcta') == 'c' || (old('correcta') == '' && isset($pregunta) && $pregunta->correcta == 'c')) selected @endif>Opción C</option>
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

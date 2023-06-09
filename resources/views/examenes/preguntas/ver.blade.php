@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">Ver  Pregunta</h3>
        <a href="{{route('preguntas.index', ['examen' => $pregunta->examen_id])}}" class="btn btn-secondary">Regresar</a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">                            
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Pertenece al examen</label></h5>
                               <h6><label for="">{{ $pregunta->examen->titulo }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Pregunta</label></h5>
                               <h6><label for="">{{ $pregunta->pregunta }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Opción A</label></h5>
                               <h6><label for="">{{ $pregunta->opcion_a }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Opción B</label></h5>
                               <h6><label for="">{{ $pregunta->opcion_b }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Opción C</label></h5>
                               <h6><label for="">{{ $pregunta->opcion_c }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Opción Correcta</label></h5>
                               <h6><label for="">{{ $pregunta->correcta }}</label></h6>                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

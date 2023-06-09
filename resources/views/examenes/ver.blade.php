@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">Ver  Examen</h3>
        <a href="{{route('examenes.index')}}" class="btn btn-secondary">Regresar</a>
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
                               <h5><label for="">Titulo</label></h5>
                               <h6><label for="">{{ $examen->titulo }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Descripción</label></h5>
                               <h6><label for="">{{ $examen->descripcion }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Grupo</label></h5>
                               <h6><label for="">{{ $examen->grupo->grado }}</label></h6>                   
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <h5><label for="">Materia</label></h5>
                               <h6><label for="">{{ $examen->materia->materia }}</label></h6>                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

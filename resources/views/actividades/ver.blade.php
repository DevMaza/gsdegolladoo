@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">ver actividad</h3>
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
                                    <h5><label for="titulo">Título</label></h5>
                                    <br>
                                    <h6><label for="titulo">{{ $actividade->titulo }}</label></h6>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">

                                    <p>{{ $actividade->descripcion }}</p>


                                </div>
                                <br>

                            </div>
                            <div>
                                <form action="{{ route('entregadeactividades.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="archivo">archivo</label>
                                                <input type="text" name="archivo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="calificacion">calificacion</label>
                                                <input type="text" name="calificacion" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="user_id">Id user</label>
                                                {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::user()->id, array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="actividade_id">Id actividad</label>
                                                {!! Form::text('actividade_id', null, array('class' => 'form-control')) !!}
                                            </div>
                                        </div>                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Entregar</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
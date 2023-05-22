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
                                    <h5><label for="archivo">Archivo</label></h5>
                                    <br>
                                    <h6><label for="archivo">{{ $entregadeactividade->archivo }}</label></h6>
                                    <br>
                                    <h5><label for="archivo">Calificacion</label></h5>
                                    <br>
                                    <h6><label for="calificacion">{{ $entregadeactividade->calificacion }}</label></h6>
                                    <br>
                                    {{-- comment 
                                    <h6><label for="user_id">{{ $entregadeactividade->user_id }}</label></h6>
                                    <br>
                                    <h6><label for="actividade_id">{{ $entregadeactividade->actividade_id }}</label></h6>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
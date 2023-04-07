@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">ver  grupos</h3>
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
                                   <h5><label for="grado">Grado</label></h5>
                                   <br>
                                   <h6><label for="grado">{{ $grupo->grado }}</label></h6>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-floating"> 
                                
                                <p>{{ $grupo->grupo }}</p>    
                                
                                
                                </div>
                            <br>
                   
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Grupo</h3>
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


                    <form action="{{ route('grupos.update',$grupo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="grado">Grado</label>
                                    <input type="text" name="grado" class="form-control" value="{{ $grupo->grado }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="periodo">Periodo</label>
                                    <input type="text" name="periodo" class="form-control" value="{{ $grupo->periodo }}">
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

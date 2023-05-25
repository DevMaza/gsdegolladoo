@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Contenido</h3>
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

                    <form action="{{ route('contenidos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Título</label>
                                   <input type="text" name="titulo" class="form-control">
                                </div>
                            </div>
                            @foreach ($grupos as $grupo)
                                    @if($grupo == \Illuminate\Support\Facades\Auth::user()->grupo_id)
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="grupo_id" value="{{$grupo}}" class="form-control" >
                                                </div>
                                            </div>
                                    @endif                               
                            @endforeach

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="materia_id">Materia</label>
                                    {!! Form::select('materia_id',$materias, null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="imagen">Subir imagen</label>
                                    <input type="file" name="imagen" class="form-control" id="imagen">
                                   
                                </div>
                            </div>
            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-floating">
                                <textarea class="form-control" name="contenido" style="height: 100px"></textarea>
                                <label for="contenido">Contenido</label>
                                </div>
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                        
                    </form>
                    {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

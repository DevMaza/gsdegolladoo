@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Actividad</h3>
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


                    <form action="{{ route('actividades.update',$actividade->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Título</label>
                                   <input type="text" name="titulo" class="form-control" value="{{ $actividade->titulo }}">
                                </div>
                            </div>
                            @foreach ($grupos as $grupo)
                            @if($grupo == \Illuminate\Support\Facades\Auth::user()->grupo_id)
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{-- comment <label for="grupo_id">Id grupo</label>--}}
                                    <input type="hidden" name="grupo_id" value="{{$grupo}}" class="form-control" >
                                    {{-- comment 
                                    <input type="text" name="grupo_id" class="form-control" value={{$grupo}}>--}}
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-floating">
                                <label for="descripcion">descripcion</label>
                                <textarea class="form-control" name="descripcion" style="height: 100px">{{ $actividade->descripcion }}</textarea>                                
                                
                                </div>
                            <br>
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

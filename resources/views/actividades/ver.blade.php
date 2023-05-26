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
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                  {{-- comment                
                                        <div class="form-floating"> 
                                                        
                                            <p></p>    <img height="500px"  src="{{asset('storage/archivos/'.$actividade->archivo)}}" alt="{{$actividade->title}}"class="img-fluid" width="400px">
                                                        
                                                </div>
                                             <br>
                                       
                                </div>--}}
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">

                                    <p>{{ $actividade->descripcion }}</p>


                                </div>
                                <br>

                            </div>
                            
                            <div>
                                <hr>
                                {{-- agrege lo de elias --}}
                                <table class="table table-bordered">
                                    <thead style="background-color:#28a745">                                     
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Nombre del Archivo</th>
                                        <th style="color:#fff;">Descargar</th>
                                        
                                    </thead>
                                  <tbody>
                                        <tr class="table-success">
                                            <td style="display: none;">{{ $actividade->id }}</td>
                                            <td>{{ $actividade->archivo}}</td>                                
                                            <td><a href="{{ route('actividade.download',$actividade->uuid)}}">{{$actividade->archivo}}</a></td>
                                        </tr>               
                                  </tbody>
                                </table>
                          {{-- comment   @foreach($entregadeactividades as $entrega) 
                                                                                                               
                                        @if ($entrega->actividade_id == $actividade->id && $entrega->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                            <h1>actividad entregada</h1>
                                            {{$tokentec++;}}
                                        @endif 
                                        @if ($entrega->user_id != \Illuminate\Support\Facades\Auth::user()->id && $tokentec==0 )
                                            {{$tokentec++;}} --}}
                                        <form action="{{ route('entregadeactividades.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="ro>0
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="archivo">Subir Archivo</label>
                                                         <input type="file" name="archivo" class="form-control" id="archivo">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                @role('Docente')
                                                    <div class="form-group">
                                                        <label for="calificacion">calificacion</label>
                                                        <input type="text" name="calificacion" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                @endrole
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        {{-- <label for="user_id">Id user</label> --}}
                                                        
                                                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        {{-- <label for="actividade_id">Id actividad</label> --}}
                                                        
                                                        <input type="hidden" name="actividade_id" value="{{$actividade->id}}" class="form-control" >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <button type="submit" class="btn btn-primary">Entregar</button>
                                                </div>
                                        </form>
                                 {{-- comment       @endif                                               
                            @endforeach  --}}                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
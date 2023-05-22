@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Actividad</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">archivo</th>
                                    <th style="color:#fff;">calificacion</th>
                                    <th style="color:#fff;">Nombre</th>                                     
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                                @foreach ($entregadeactividades as $entregadeactividade)
                                <tr>
                                    <form action="{{ route('entregadeactividades.update',$entregadeactividade->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @foreach ($users as $user)
                                                @if($user->id == $entregadeactividade->user_id )
                                                <input type="hidden" name="namex" value="{{$namex=$user->name}}" class="form-control" >
                                                    
                                                @endif                                       
                                                @if($user->name == \Illuminate\Support\Facades\Auth::user()->name) 
                                                    @if($entregadeactividade->actividade_id == $idact)
                                                        <td style="display: none;">{{ $entregadeactividade->id }}</td>  
                                                        <td><a href="{{ route('descarga.download',$entregadeactividade->uuid)}}">{{$entregadeactividade->archivo}}</a></td>                              
                                                        <td>{{$entregadeactividade->calificacion}} </td>
                                                        <td>{{ $namex}}</td>
                                                        <td>
                                                            <form action="{{ route('entregadeactividades.destroy',$idact) }}" method="POST">                                        
                                                                @can('editar-actividade')      
                                                                <a class="btn btn-info" href="{{ route('entregadeactividades.edit',$entregadeactividade->id) }}">calificar</a>
                                                                @endcan

                                                                @can('ver-actividade')
                                                                <a class="btn btn-success" href="{{ route('entregadeactividades.show',$entregadeactividade->id) }}">ver</a>
                                                                @endcan
                                                                @csrf
                                                                @method('DELETE')
                                                                
                                                                <button type="submit" class="btn btn-danger">eliminar</button>
                                                                
                                                            </form>
                                                        </td>

                                                    {{-- comment 
                                                            <td style="display: none;">{{ $entregadeactividade->id }}</td>                                
                                                            <td>{{ $entregadeactividade->archivo }}</td>
                                                                <td><input type="text" name="calificacion" value={{$entregadeactividade->calificacion}} ></td>
                                                                <td>{{ $namex }}</td>
                                                                <td>                                                            
                                                                <button type="submit" class="btn btn-primary">añadir</button>                                                       
                                                                </td>--}}
                                                    @endif                                                
                                                @endif                
                                        @endforeach                                    
                                </tr>
                                @endforeach 
                            </form>                   
                                </tbody>
                        </table>
                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $entregadeactividades->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

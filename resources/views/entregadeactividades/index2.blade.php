@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">calificaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">archivoooo</th>
                                    <th style="color:#fff;">calificacion</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">observaciones</th>                                                                                                 
                              </thead>
                              
                              <tbody>
                                @foreach ($entregadeactividades as $entregadeactividade)
                                <tr>
                                
                                        @csrf
                                        @method('PUT')
                                       
                                                @if($entregadeactividade->user_id == \Illuminate\Support\Facades\Auth::user()->id) 
                                                        <td style="display: none;">{{ $entregadeactividade->id }}</td>  
                                                        <td><a href="{{ route('descarga.download',$entregadeactividade->uuid)}}">{{$entregadeactividade->archivo}}</a></td>                              
                                                        <td>{{$entregadeactividade->calificacion}} </td>
                                                        <td>{{ $namex=\Illuminate\Support\Facades\Auth::user()->name}} {{ $namex=\Illuminate\Support\Facades\Auth::user()->apellido}}</td>
                                                        <td>{{$entregadeactividade->observacion}} </td>

                                                    {{-- comment 
                                                            <td style="display: none;">{{ $entregadeactividade->id }}</td>                                
                                                            <td>{{ $entregadeactividade->archivo }}</td>
                                                                <td><input type="text" name="calificacion" value={{$entregadeactividade->calificacion}} ></td>
                                                                <td>{{ $namex }}</td>
                                                                <td>                                                            
                                                                <button type="submit" class="btn btn-primary">añadir</button>                                                       
                                                                </td>--}}
                                                                                              
                                                @endif                
                                                                       
                                </tr>
                                @endforeach 
                  
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

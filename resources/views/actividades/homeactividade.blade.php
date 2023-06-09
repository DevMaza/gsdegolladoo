@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Panel de Actividades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">                        
                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                    <h5>Matematicas</h5>         
                                                    <img src="{{ asset('img/logomat.jpg') }}" alt="logomat" width="55"
                                                        class="shadow-light">                                      
                                                        @php
                                                        use App\Models\Materia;
                                                        $cant_materias = Materia::count();                                                
                                                        @endphp
                                                        {{-- comment 
                                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_materias}}</span></h2>--}}
                                                        <p class="m-b-0 text-right"><a href="{{ route('actividades.index',1) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                    </div>    
                                
                                                </div>                                    
                                        </div>

                                        
                                        
                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-green order-card">
                                                <div class="card-block">
                                                <h5>Español</h5> 
                                                <img src="{{ asset('img/logoesp.png') }}" alt="logomat" width="70"
                                                class="shadow-light">                                                 
                                                    @php
                                                    use Spatie\Permission\Models\Role;
                                                    $cant_roles = Role::count();                                                
                                                    @endphp
                                                        <p class="m-b-0 text-right"><a href="{{ route('actividades.index',2) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                </div>
                                            </div>
                                        </div>                                                                
                                        
                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-pink order-card">
                                                <div class="card-block">
                                                    <h5>Geografia</h5> 
                                                    <img src="{{ asset('img/geo.png') }}" alt="logomat" width="60"
                                                class="shadow-light">  
                                                                                                  
                                                    @php
                                                    use App\Models\Contenido;
                                                    $cant_contenidos = Contenido::count();                                                
                                                    @endphp
                                                    <p class="m-b-0 text-right"><a href="{{ route('contenidos.index',3) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                        <h5>Formacion civica y etica</h5>         
                                                        <img src="{{ asset('img/civica.jpg') }}" alt="logomat" width="55"
                                                            class="shadow-light">                                      
                                                            {{-- comment 
                                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_materias}}</span></h2>--}}
                                                            <p class="m-b-0 text-right"><a href="{{ route('contenidos.index',4) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                    </div> 
                                            </div>                                    
                                        </div>
                                        

                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-green order-card">
                                                <div class="card-block">
                                                <h5>Ciencias Naturales</h5> 
                                                <img src="{{ asset('img/ciencia.jpg') }}" alt="logomat" width="70"
                                                class="shadow-light">                                                 
                                                        <p class="m-b-0 text-right"><a href="{{ route('contenidos.index',5) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-pink order-card">
                                                <div class="card-block">
                                                    <h5>Historia</h5> 
                                                    <img src="{{ asset('img/Historia.jpg') }}" alt="logomat" width="50"
                                                class="shadow-light">  
                                                                                                  

                                                    <p class="m-b-0 text-right"><a href="{{ route('contenidos.index',6) }}" class="text-white"><h6>Ver más</h6></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




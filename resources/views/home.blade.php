@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Panel</h3>
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
                                                    <h5>Usuarios</h5>                                               
                                                        @php
                                                        use App\Models\User;
                                                        $cant_usuarios = User::count();                                                
                                                        @endphp
                                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                        <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                                    </div>                                            
                                                </div>                                    
                                        </div>
                                        
                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-green order-card">
                                                <div class="card-block">
                                                <h5>Roles</h5>                                               
                                                    @php
                                                    use Spatie\Permission\Models\Role;
                                                    $cant_roles = Role::count();                                                
                                                    @endphp
                                                    <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                    <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                                </div>
                                            </div>
                                        </div>                                                                
                                        
                                        <div class="col-md-4 col-xl-4">
                                            <div class="card bg-c-pink order-card">
                                                <div class="card-block">
                                                    <h5>Contenidos</h5>                                               
                                                    @php
                                                    use App\Models\Contenido;
                                                    $cant_contenidos = Contenido::count();                                                
                                                    @endphp
                                                    <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_contenidos}}</span></h2>
                                                    <p class="m-b-0 text-right"><a href="/homecontenido" class="text-white">Ver más</a></p>
                                                </div>
                                            </div>
                                        </div>
                                   {{-- editaarrrrr --}} 
                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-blue order-card">
                                                <div class="card-block">
                                                    <h5>Grupos</h5>                                               
                                                    @php
                                                    use App\Models\Grupo;
                                                    $cant_grupos = Grupo::count();                                                
                                                    @endphp
                                                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_grupos}}</span></h2>
                                                    <p class="m-b-0 text-right" ><a href="/grupos" class="text-white">Ver más</a></p>
                                                </div>                                         
                                            </div>                                    
                                        </div>
                                        
                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-green order-card">
                                                <div class="card-block">
                                                    <h5>Materias</h5>                                               
                                                    @php
                                                    use App\Models\Materia;
                                                    $cant_materias = Materia::count();                                                
                                                    @endphp
                                                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_materias}}</span></h2>
                                                    <p class="m-b-0 text-right" ><a href="/materias" class="text-white">Ver más</a></p>
                                                </div>                                            
                                            </div>                                    
                                        </div>

                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-pink order-card">
                                                <div class="card-block">
                                                    <h5>Actividades</h5>                                               
                                                    @php
                                                    use App\Models\Actividade;
                                                    $cant_act = Actividade::count();                                                
                                                    @endphp
                                                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_act}}</span></h2>
                                                    <p class="m-b-0 text-right" ><a href="/homeactividade" class="text-white">Ver más</a></p>
                                                </div>                                              
                                            </div>                                    
                                        </div>
                                        {{-- comment 
                                        <div class="col-md-4 col-xl-4">
                                            
                                            <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                    <h5>Examenes</h5>                                              
                                                    </div>                                            
                                            </div>                                    
                                        </div>
                                        --}}
                                </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




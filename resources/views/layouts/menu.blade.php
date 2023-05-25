<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Panel</span>
    </a>
    @role('Administrador')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    
    
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>

    <a class="nav-link" href="/grupos">
        <i class="fas fa-users"></i><span>Grupos</span>
    </a>

    <a class="nav-link" href="/materias">
        <i class="fas fa-users"></i><span>Materias</span>
    </a>
  
    @endrole
    <a class="nav-link" href="/homecontenido">
        <i class=" fas fa-blog"></i><span>Contenidos</span>
    </a>

    
    <a class="nav-link" href="/actividades">
        <i class=" fas fa-blog"></i><span>Actividades</span>
    </a>

    <a class="nav-link" href="/entregadeactividades">
        <i class=" fas fa-blog"></i><span>Calificaciones</span>
    </a>

    <a class="nav-link" href="#">
        <i class=" fas fa-blog"></i><span>Examenes</span>
    </a>

</li>

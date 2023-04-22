<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @role('Administrador')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    
    
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
  
    @endrole
    <a class="nav-link" href="/contenidos">
        <i class=" fas fa-blog"></i><span>Contenidos</span>
    </a>
    <a class="nav-link" href="/grupos">
        <i class="fas fa-users"></i><span>Grupos</span>
    </a>
    
    <a class="nav-link" href="#">
        <i class=" fas fa-blog"></i><span>Actividades</span>
    </a>

    <a class="nav-link" href="#">
        <i class=" fas fa-blog"></i><span>Calificaciones</span>
    </a>

    <a class="nav-link" href="#">
        <i class=" fas fa-blog"></i><span>Examenes</span>
    </a>

</li>

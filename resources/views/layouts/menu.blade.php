@role('Administrador')
<li class="side-menus @if(Route::is('home')) active @endif">
    <a class="nav-link" href="{{route('home')}}">
        <i class=" fas fa-building"></i><span>Panel</span>
    </a>
</li>

<li class="side-menus @if(Route::is('usuarios.index') || Route::is('usuarios.create') || Route::is('usuarios.edit') || Route::is('usuarios.show')) active @endif">
    <a class="nav-link" href="{{route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
</li>
<li class="side-menus @if(Route::is('roles.index') || Route::is('roles.create') || Route::is('roles.edit') || Route::is('roles.show')) active @endif">
    <a class="nav-link" href="{{route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
</li>
<li class="side-menus @if(Route::is('grupos.index') || Route::is('grupos.create') || Route::is('grupos.edit') || Route::is('grupos.show')) active @endif">
    <a class="nav-link" href="{{route('grupos.index')}}">
        <i class="fas fa-users"></i><span>Grupos</span>
    </a>
</li>
<li class="side-menus @if(Route::is('materias.index') || Route::is('materias.create') || Route::is('materias.edit') || Route::is('materias.show')) active @endif">
    <a class="nav-link" href="{{route('materias.index')}}">
        <i class="fas fa-users"></i><span>Materias</span>
    </a>
</li>
@endrole
<li class="side-menus @if(Route::is('homecontenido')) active @endif">
    <a class="nav-link" href="{{route('homecontenido')}}">
        <i class=" fas fa-blog"></i><span>Contenidos</span>
    </a>
</li>
<li class="side-menus @if(Route::is('homeactividade')) active @endif">
    <a class="nav-link" href="{{route('homeactividade')}}">
        <i class=" fas fa-blog"></i><span>Actividades</span>
    </a>
</li>
@role('Alumno')
<li class="side-menus @if(Route::is('homeindex')) active @endif">
    <a class="nav-link" href="{{route('homeindex')}}">
        <i class=" fas fa-blog"></i><span>Calificacion actividad</span>
    </a>
</li>
@endrole
@canany(['ver-examen', 'crear-examen', 'editar-examen', 'borrar-examen', 'ver-pregunta', 'crear-pregunta', 'editar-pregunta', 'borrar-pregunta'])
<li class="side-menus @if(Route::is('examenes.index') || Route::is('examenes.create') || Route::is('examenes.edit') || Route::is('examenes.show') || Route::is('preguntas.show') || Route::is('preguntas.index') || Route::is('preguntas.create') || Route::is('preguntas.edit')) active @endif">
    <a class="nav-link" href="{{route('examenes.index')}}">
        <i class=" fas fa-vials"></i><span>Examenes</span>
    </a>
</li>
@endcanany
@canany(['realizar-examen'])
<li class="side-menus @if(Route::is('mis-examenes')) active @endif">
    <a class="nav-link" href="{{route('mis-examenes')}}">
        <i class=" fas fa-list"></i><span>Mis Examenes</span>
    </a>
</li>
@endcanany
@canany(['ver-calificaciones-mias', 'ver-calificaciones-grupo'])
<li class="side-menus @if(Route::is('calificaciones')) active @endif">
    <a class="nav-link" href="{{route('calificaciones')}}">
        <i class=" fas fa-check-double"></i><span>Mis Calificaciones</span>
    </a>
</li>
@endcanany
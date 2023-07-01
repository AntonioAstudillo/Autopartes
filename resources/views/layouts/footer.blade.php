
<div class="b-example-divider"></div>
<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">Inicio</a></li>
      <li class="nav-item"><a href="{{route('catalogo' , ['catalogo' => 'Frenos'])}}" class="nav-link px-2 text-muted">Catálogo Frenos</a></li>
      <li class="nav-item"><a href="{{route('catalogo' , ['catalogo' => 'Suspension'])}}" class="nav-link px-2 text-muted">Catálogo Suspensión</a></li>
      <li class="nav-item"><a href="{{route('contacto')}}" class="nav-link px-2 text-muted">Contacto</a></li>
      <li class="nav-item"><a href="{{route('login')}} "class="nav-link px-2 text-muted">Administradores</a></li>
    </ul>
    <p class="text-center text-muted">&copy; {{date('Y')}} Autopartes, S.V México</p>
  </footer>
</div>

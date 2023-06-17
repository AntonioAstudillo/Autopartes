

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-1 bg-body navbarColor fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="{{route('home')}}"><span class="colorLogo">Auto</span>partes<span class="mx">MX</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="nosostrosItem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nosotros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="nosostrosItem">
                        <li><a class="dropdown-item" href="{{route('nosotros')}}">Quiénes somos</a></li>
                        <li><a class="dropdown-item" href="{{route('informacion')}}">Informacíón</a></li>
                        <li><a class="dropdown-item" href="{{route('politica')}}">Política</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catálogos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="{{route('catalogo' , ['catalogo' => 'Frenos'])}}">Frenos</a></li>
                        <li><a class="dropdown-item" href="{{route('catalogo' , ['catalogo' => 'Suspension'])}}">Suspensión</a></li>
                        <li><a class="dropdown-item" href="{{route('descargas')}}">Descargar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('videos')}}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('privacidad')}}">Privacidad</a>
                </li>
            </ul>
            <span class="navbar-text ">
                <livewire:search-input />
            </span>
        </div>
    </div>
</nav>

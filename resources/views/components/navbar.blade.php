<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://picsum.photos/150/80" alt="Logo" width="30" height="30" >
        </a>
        @auth
        <a class="navbar-text text-decoration-none">Ciao, {{ Auth::user()->name }}</a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
=======
<nav class="navbar navbar-expand-lg bg-body-tertiary container rounded-4 p-4">
    <div class="container-fluid">
        <a class="navbar-brand Brand" href="{{ route('home') }}">Atlas Avenue</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> f9d13a63720633859a9bdb9db4c1af106b0517e5
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Crea un Annuncio</a>
                </li>
                @endguest
                
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.create') }}">Crea un Annuncio</a>
                </li>
                @if (Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link bnt bnt-outline-success btn-sm position-relative w-sm-25"
                    href="{{ route('revisor.index') }}">Zona Revisore <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::ToBeRevisedCount() }}</a>
                </li>
                @endif
                @endauth
                
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorie</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                            href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                        </li>
<<<<<<< HEAD
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
=======
                    @endif
                @endauth

                @auth

                    <!-- Tendina Utente -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                                </li>
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <form role="search" class="d-flex" role="search" action="{{ route('article.search') }}" method="GET">
                        <input type="text" name="query" class="px-3" placeholder="Cerca..." />
                        <button type="submit" class="btn btn-light m-2" style="width: 60px">
                            Cerca
                        </button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false titoli">
                            Ciao, Ospite
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        </ul>
                    </li>
                @endguest
>>>>>>> f9d13a63720633859a9bdb9db4c1af106b0517e5
                </li>
                @endauth
            </ul>
            
            @guest
            <div class="d-flex">
                <a class="btn btn-outline-success me-2" href="{{route('login')}}" type="button">Entra</a>
                <a class="btn btn-outline-primary" href="{{route('register')}}" type="button">Registrati</a>
            </div>
            @endguest
            
            @auth
            <div>
                <a href="#" class="btn btn-outline-danger me-2"
                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
            </div>
            <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                @csrf
            </form>
            @endauth
        </div>
    </div>
</nav>


{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Atlas Avenue</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.index') }}">Catalogo</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Crea un Annuncio</a>
            </li>
            @endguest
            
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.create') }}">Crea un Annuncio</a>
            </li>
            @if (Auth::user()->is_revisor)
            <li class="nav-item">
                <a class="nav-link bnt bnt-outline-success btn-sm position-relative w-sm-25"
                href="{{ route('revisor.index') }}">Zona Revisore <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::ToBeRevisedCount() }}</a>
            </li>
            @endif
            @endauth
            @auth
            <!-- Tendina Utente -->
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Categorie
            </a>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                <li><a class="dropdown-item"
                    href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                </li>
                @if (!$loop->last)
                <hr class="dropdown-divider">
                @endif
                @endforeach
            </ul>
        </li>
        <form role="search" class="d-flex" role="search" action="{{ route('article.search') }}" method="GET">
            <input type="text" name="query" class="px-3" placeholder="Cerca..." />
            <button type="submit" class="btn btn-light m-2" style="width: 60px">
                Cerca
            </button>
        </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Ciao, {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
            <li><a href="#" class="dropdown-item"
                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
            </li>
            <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                @csrf
            </form>
        </ul>
    </li>
    @endauth
    @guest
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Ciao, Ospite
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
        <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
    </ul>
</li>
@endguest
</li>
</ul>
</div>
</div>
</nav> --}}


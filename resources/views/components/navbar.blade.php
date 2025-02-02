<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="{{ route('article.index') }}">
                        <i class="bi bi-grid-3x3-gap-fill nav-icon"></i>
                        <span>Catalogo</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    @auth
                    <a class="nav-link d-flex align-items-center" href="{{ route('article.create') }}">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span></span>
                    </a>
                    @else
                    <a class="nav-link d-flex align-items-center" href="{{ route('register') }}">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span></span>
                    </a>
                    @endauth
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-book nav-icon"></i>
                        <span></span>
                    </a>
                    <ul class="dropdown-menu animated">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('byCategory', ['category' => $category]) }}">
                                <span class="dropdown-divider"></span>
                                <span>{{ $category->name }}</span>
                            </a>
                        </li>
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
            {{-- Brand Icon --}}
            <a class="navbar-brand p-0 me-auto d-flex align-items-center" href="{{ route('home') }}">
                <svg class="navbar-logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 6L13 8L17 4M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" 
                    stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"/>
                </svg>
                <span class="logo-text ms-2 text-white">BuyStream</span>
            </a>

            {{-- Search Bar --}}
            <form class="d-flex me-3" action="{{ route('article.search') }}" method="GET">
                <div class="search-wrapper">
                    <input type="text" name="query" class="form-control search-input" placeholder="Cerca..."
                        minlength="1">
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Notifications Bell --}}
            @auth
                @if(Auth::user()->is_revisor)
                    <div class="nav-item me-3">
                        <a class="nav-link position-relative" href="{{ route('revisor.dashboard') }}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                            </svg>
                            @if(App\Models\Article::revisorPendingRequests() > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Article::revisorPendingRequests() }}
                                </span>
                            @else
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                </span>
                            @endif
                        </a>
                    </div>
                @endif
            @endauth

            {{-- Account Menu per chi è loggato --}}
            @auth
            <div class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="rounded-circle overflow-hidden" style="width: 32px; height: 32px;">
                        <img src="{{ asset('storage/media/user/default-user.png') }}" alt="User" class="img-fluid">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('article.create') }}">Crea Annuncio</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth

            {{-- Account Menu per chi è non loggato --}}
            @guest
                <a class="user-button" href="{{ route('login') }}">Accedi</a>
                <a class="user-button" href="{{ route('register') }}">Registrati</a>
            @endguest
        </div>
    </div>
</nav>
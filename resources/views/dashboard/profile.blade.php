<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle overflow-hidden me-3" style="width: 64px; height: 64px;">
                                <img src="{{ asset('/img/user/default-user.png') }}" alt="Profile" class="img-fluid">
                            </div>
                            <div>
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                        </div>
                        <hr>
                        <nav class="nav flex-column">
                            <a class="linkDash active" href="{{ route('dashboard') }}">
                                <i class="bi bi-house me-2 "></i>Dashboard
                            </a>
                            <a class="linkDash active" href="#">
                                <i class="bi bi-box me-2"></i>I miei articoli
                            </a>
                            <a class="linkDash active" href="{{ route('dashboard.profile') }}">
                                <i class="bi bi-person me-2"></i>Profilo
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Contenuto principale -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Profilo Utente</h5>
                        <p class="card-text">Qui puoi visualizzare e modificare le tue informazioni personali.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

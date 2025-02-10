<x-layout>
    <div class="container py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle overflow-hidden me-3" style="width: 64px; height: 64px;">
                                <img src="{{ asset('/img/user/default-user.png') }}" alt="Default User Profile"
                                    class="img-fluid">
                            </div>
                            <div>
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Stats -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Articoli Pubblicati</h6>
                                <h3>{{ $user->articles->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">In Revisione</h6>
                                <h3>{{ $user->articles->where('is_accepted', null)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Approvati</h6>
                                <h3>{{ $user->articles->where('is_accepted', true)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Articles -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        @if ($articles->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titolo</th>
                                            <th>Prezzo</th>
                                            <th>Stato</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $article->title }}</td>
                                                <td>{{ $article->price }}€</td>
                                                <td>
                                                    @if ($article->is_accepted === true)
                                                        <span class="badge bg-success">Approvato</span>
                                                    @elseif($article->is_accepted === false)
                                                        <span class="badge bg-danger">Rifiutato</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">In revisione</span>
                                                    @endif
                                                </td>
                                                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <p class="text-muted mb-0">Non hai ancora pubblicato articoli</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

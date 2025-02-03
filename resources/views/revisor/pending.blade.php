<x-layout>
    @if (session()->has('content'))
        <div class="alert alert-success">
            {{ session('content') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="mb-4">Annunci in Attesa di Revisione</h2>

        <div class="row">
            <!-- Lista annunci in attesa -->
            <div class="col-12">
                @forelse($pending_articles as $article)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    @if ($article->images && $article->images->first())
                                        <img src="{{ Storage::url($article->images->first()->path) }}"
                                            class="img-fluid rounded" alt="{{ $article->title }}">
                                    @else
                                        <img src="https://picsum.photos/200" class="img-fluid rounded"
                                            alt="Placeholder">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <span class="badge bg-warning text-dark">In Attesa</span>
                                    </div>
                                    <p class="card-text">{{ Str::limit($article->description, 150) }}</p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0"><small class="text-muted">Categoria:
                                                    {{ $article->category->name }}</small></p>
                                            <p class="mb-0"><small class="text-muted">Prezzo:
                                                    €{{ $article->price }}</small></p>
                                            <p class="mb-0">
                                                <small class="text-muted">
                                                    Caricato il {{ $article->created_at->format('d/m/Y H:i') }}
                                                </small>
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('revisor.accept', ['article' => $article]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-check-lg"></i> Approva
                                                </button>
                                            </form>
                                            <form action="{{ route('revisor.reject', ['article' => $article]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x-lg"></i> Rifiuta
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        <i class="bi bi-check-circle text-success" style="font-size: 3rem;"></i>
                        <p class="mt-3">Non ci sono annunci in attesa di revisione al momento.</p>
                    </div>
                @endforelse
                <div>
                    <a class="btn btnRevBuy" href="{{ route('revisor.dashboard') }}">Indietro</a>
                </div>

                <!-- Paginazione -->
                <div class="d-flex justify-content-center">
                    {{ $pending_articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>

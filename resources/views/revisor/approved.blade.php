<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Annunci Revisionati</h2>
        
        <div class="row">
            <!-- Filtri -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filtri</h5>
                        <form action="{{ route('revisor.approved') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label">Stato</label>
                                <select name="status" class="form-select">
                                    <option value="all" @if(request('status') == 'all') selected @endif>Tutti</option>
                                    <option value="1" @if(request('status') == '1') selected @endif>Approvati</option>
                                    <option value="0" @if(request('status') == '0') selected @endif>Respinti</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Applica Filtri</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Lista Annunci -->
            <div class="col-md-9">
                @forelse($articles as $article)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    @if($article->images && $article->images->first())
                                        <img src="{{ Storage::url($article->images->first()->path) }}" 
                                             class="img-fluid rounded" 
                                             alt="{{ $article->title }}">
                                    @else
                                        <img src="https://picsum.photos/200" 
                                             class="img-fluid rounded" 
                                             alt="Placeholder">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <span class="badge {{ $article->is_accepted ? 'bg-success' : 'bg-danger' }}">
                                            {{ $article->is_accepted ? 'Approvato' : 'Respinto' }}
                                        </span>
                                    </div>
                                    <p class="card-text">{{ Str::limit($article->description, 150) }}</p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0"><small class="text-muted">Categoria: {{ $article->category->name }}</small></p>
                                            <p class="mb-0"><small class="text-muted">Prezzo: €{{ $article->price }}</small></p>
                                            <p class="mb-0">
                                                <small class="text-muted">
                                                    Revisionato da: {{ $article->revisor->name ?? 'N/A' }}
                                                    il {{ $article->updated_at->format('d/m/Y H:i') }}
                                                </small>
                                            </p>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Dettagli</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        Nessun annuncio revisionato trovato.
                    </div>
                @endforelse

                <!-- Paginazione -->
                <div class="d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
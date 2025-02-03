<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Annunci Approvati</h2>


        <!-- Lista Annunci -->

        <div id="articles-container" class="row justify-content-start g-4">
            @foreach ($articles as $article)
                <div class="col-12 col-sm-6 col-lg-4 article-card" data-title="{{ $article->title }}"
                    data-price="{{ $article->price }}" data-category="{{ $article->category_id }}"
                    data-currency="{{ $article->currency }}">
                    <livewire:article-card :article="$article" />
                </div>
            @endforeach
        </div>

        <!-- Paginazione -->
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
    </div>
    </div>
</x-layout>



{{-- <div class="col-md-9">
    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @if ($article->images && $article->images->first())
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
    @endforelse --}}

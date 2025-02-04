<x-layout>
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('article.index') }}" style="color: #198754">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('byCategory', ['category' => $article->category]) }}" style="color: #198754">{{ $article->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <!-- Colonna Immagini -->
            <div class="col-12 col-lg-6 mb-4">
                @if ($article->images->count() > 0)
                <div id="articleCarousel" class="carousel slide shadow" data-bs-ride="carousel">
                    <div class="carousel-inner rounded">
                        @foreach ($article->images as $key => $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article->title }}">
                        </div>
                        @endforeach
                    </div>
                    @if ($article->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
                @else
                <img src="https://picsum.photos/700/600" class="img-fluid shadow" alt="Nessuna foto inserita dall'utente">
                @endif
            </div>

            
            <!-- Colonna Dettagli -->
            <div class="col-12 col-lg-6">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <h1 class="display-5 mb-4">{{ $article->title }}</h1>
                        
                        <div class="d-flex align-items-center mb-4">
                            <span class="h2 mb-0 me-2">€{{ number_format($article->price, 2, ',', '.') }}</span>
                            <span class="badge bg-success">Disponibile</span>
                        </div>
                        
                        <h5 class="text-muted mb-3">Descrizione</h5>
                        <p class="lead mb-4">{{ $article->description }}</p>
                        
                        <div class="mb-4">
                            <h5 class="text-muted mb-3">Dettagli</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-tag-fill text-primary me-2"></i>
                                    Categoria: <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="text-decoration-none">{{ $article->category->name }}</a>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar-event text-primary me-2"></i>
                                    Pubblicato il: {{ $article->created_at->format('d/m/Y') }}
                                </li>
                            </ul>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg">
                                <i class="bi bi-cart-plus me-2"></i>
                                Aggiungi al Carrello
                            </button>
                            <a href="{{ route('article.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>
                                Torna agli annunci
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

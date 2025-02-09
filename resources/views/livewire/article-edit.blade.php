{{-- <div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('article.index') }}" style="color: #198754">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    style="color: #198754">{{ $article->category->name }}</a></li>
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
                                <img src="{{ $image->getUrl(800, 800) }}" class="d-block w-100"
                                    alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article->title }}">
                            </div>
                        @endforeach
                    </div>
                    @if ($article->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            @else
                <img src="https://picsum.photos/700/600" class="img-fluid shadow"
                    alt="Nessuna foto inserita dall'utente">
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
                                Categoria: <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                                    class="text-decoration-none">{{ $article->category->name }}</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                Pubblicato il: {{ $article->created_at->format('d/m/Y') }}
                            </li>
                        </ul>
                    </div>

                    <div class="d-grid gap-2">
                        @auth
                            @if (Auth::id() === $article->user_id)
                                <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-success btn-lg">
                                    <i class="bi bi-pencil-square me-2"></i>
                                    Modifica Il Tuo Articolo
                                </a>
                            @endif
                        @endauth
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
</div> --}}




<div class="container col-12 py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form wire:submit="update">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="title" wire:model.live="title"
                        placeholder="es. TV, fiat 500, iPhone">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label text-sm">Inserisci Immagine</label>
                    <input type="file" wire:model.live="temporary_images" multiple
                        class="form-control shadow text-sm @error('temporary_images.*') is-invalid @enderror"
                        placeholder="Img/">
                    @error('temporary_images.*')
                        <p class="fst-italic text-danger text-xs">{{ $message }}</p>
                    @enderror
                    @error('temporary_images')
                        <p class="fst-italic text-danger text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <p>Vecchia Immagine</p>
                <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 800) : 'https://picsum.photos/700/600'}}" alt="Immagine di {{$article->title}}" style="width: 100%;" class="mb-3">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <input type="text" class="form-control" id="description" wire:model.live="description">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria:</label>
                    <select class="form-control" id="category" wire:model.live="category_id">
                        <option value="">Seleziona una categoria</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option disabled>Nessuna categoria disponibile</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" step="0.01" id="price" wire:model.live="price"
                            placeholder="0.00">
                        <select class="form-select" id="currency" wire:model.live="currency">
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @error('currency')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-success me-2">Modifica Annuncio</button>
                    <button type="button" wire:click='destroy' class="btn btn-danger">Elimina</button>
                </div>
                <a class="btn btn-secondary mt-3" href="{{ route('article.show', compact('article')) }}">Indietro</a>
            </form>
        </div>
    </div>
</div>

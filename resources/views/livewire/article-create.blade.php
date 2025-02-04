<div class="container-fluid px-0 article-create-container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row g-0 align-items-stretch rounded-4 overflow-hidden mw-1200 w-100">
        <div class="col-12 col-lg-5">
            <div class="cover h-100">
                <img src="{{ asset('img/article/article-create.png') }}" alt="Create Article"
                    class="img-fluid w-100 h-100 object-cover">
            </div>
        </div>
        <div class="col-12 col-lg-7 bg-light p-4 p-lg-5 form-custom">
            <h2 class="mb-4">Crea un Nuovo Annuncio</h2>
            <div class="mb-3">
                <i class="bi bi-pencil-square me-2"></i>Compila tutti i campi per pubblicare il tuo articolo
            </div>

            <form wire:submit="store" class="form-custom">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="title" class="form-label">Titolo dell'Annuncio</label>
                        <input type="text" class="form-control custom-input" id="title" wire:model.live="title"
                            placeholder="es. Libro, iPhone, SmartTV...">
                        @error('title')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle custom-input w-100 text-start" type="button"
                                id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $category_id ? $categories->firstWhere('id', $category_id)->name : 'Seleziona una categoria' }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-animation"
                                aria-labelledby="categoryDropdown">
                                @forelse ($categories as $category)
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            wire:click.prevent="$set('category_id', {{ $category->id }})">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li><a class="dropdown-item disabled">Nessuna categoria disponibile</a></li>
                                @endforelse
                            </ul>
                        </div>
                        @error('category_id')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Inserisci Immagine</label>
                        <input type="file" wire:model.live="temporary_images" multiple
                            class="form-control shadow @error('temporary_images.*') is-invalid @enderror"
                            placeholder="Img/">
                        @error('temporary_images.*')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                        @error('temporary_images')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Photo preview:</p>
                                <div class="row border border-4 border-success rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col d-flex flex-column align-items-center my-3">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                            <button type="button" class="btn btn-danger mt-2"
                                                wire:click="removeImage({{ $key }})">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 mb-3">
                        <label for="description" class="form-label">Descrizione Dettagliata</label>
                        <textarea class="form-control custom-input" id="description" wire:model.live="description" rows="4"
                            placeholder="Inserisci una descrizione esauriente del tuo articolo..."></textarea>
                        @error('description')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-8 mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <div class="input-group">
                            <input type="number" class="form-control custom-input" step="0.01" id="price"
                                wire:model.live="price" placeholder="0.00">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle custom-input" type="button" id="currencyDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $currency }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-animation"
                                    aria-labelledby="currencyDropdown">
                                    <li><a class="dropdown-item" href="#"
                                            wire:click.prevent="$set('currency', 'EUR')">€ EUR</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            wire:click.prevent="$set('currency', 'USD')">$ USD</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            wire:click.prevent="$set('currency', 'GBP')">£ GBP</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            wire:click.prevent="$set('currency', 'JPY')">¥ JPY</a></li>
                                </ul>
                            </div>
                        </div>
                        @error('price')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                        @error('currency')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4 mb-3 align-self-end">
                        <button type="submit" class="btn hero-button-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>
                            Aggiungi Annuncio
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-3">
                <div class="postcard__tagbox">
                    <span class="tag__item">
                        <i class="bi bi-info-circle me-1"></i>
                        Tutti i campi sono obbligatori
                    </span>
                    <span class="tag__item">
                        <i class="bi bi-shield-check me-1"></i>
                        Dati al sicuro
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

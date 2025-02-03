<x-layout>
    @if (session('success'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid vh-100">
        <div class="row">
            <!-- Sidebar with Filters -->
            <div class="col-md-3 mb-4">
                <div class="sidebar-filter bg-light p-4 rounded shadow-sm" style="width: 400px">
                    <h5 class="mb-4 text-black">Filtri di Ricerca</h5>

                    <!-- Search -->
                    <div class="search-wrapper mb-4 d-flex align-items-center">
                        <form action="{{ route('article.search') }}" method="GET" class="d-flex w-100">
                            <input type="text" class="search-input" id="search" name="query"
                                placeholder="Cerca articoli..." value="{{ request('query') }}">
                            <button type="submit" class="search-button d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Category -->
                    <div class="filter-group">
                        <label for="categoryDropdown" class="text-black">Categoria</label>
                        <div class="dropdown">
                            <button
                                class="dropdown-menu text-black w-100 d-flex justify-content-between align-items-center"
                                type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Tutte le categorie</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="categoryDropdown">
                                <li><a class="dropdown-item" href="#" data-value="">Tutte le categorie</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="#"
                                            data-value="{{ $category->id }}">{{ $category->name }}</a></li>
                                    @if (!$loop->last)
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <form id="filterForm" action="{{ route('article.index') }}" method="GET">
                        <div class="filter-group">
                            <label>Range di Prezzo</label>
                            <div class="range-container">
                                <div class="range-values">
                                    <span class="min-value">0€</span>
                                    <span class="max-value">9999€</span>
                                </div>
                                <div class="double-slider">
                                    <div class="track"></div>
                                    <div class="range"></div>
                                    <div class="thumb left"></div>
                                    <div class="thumb right"></div>
                                    <input type="hidden" id="min-price" name="min-price" value="0">
                                    <input type="hidden" id="max-price" name="max-price" value="9999">
                                </div>
                                <div class="slider-markers">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Currency -->
                    <div class="filter-group">
                        <label for="currency">Valuta</label>
                        <select id="currency" name="currency">
                            <option value="">Tutte le valute</option>
                            <option value="EUR">Euro (€)</option>
                            <option value="USD">Dollaro ($)</option>
                            <option value="GBP">Sterlina (£)</option>
                            <option value="JPY">Yen (¥)</option>
                        </select>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="applyFilters flex-grow-1">
                            <i class="bi bi-filter"></i>
                            Applica Filtri
                        </button>
                        <button id="resetFilters" class="resetFilters flex-grow-1">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            Resetta Filtri
                        </button>
                    </div>
                </div>
            </div>

            <!-- Newest Articles -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12 text-center mt-5 mb-5">
                        <h1>Articoli</h1>
                    </div>
                </div>

                <div id="articles-container" class="row justify-content-start g-4">
                    @foreach ($articles as $article)
                        <div class="col-12 col-sm-6 col-lg-4 article-card" data-title="{{ $article->title }}"
                            data-price="{{ $article->price }}" data-category="{{ $article->category_id }}"
                            data-currency="{{ $article->currency }}">
                            <livewire:article-card :article="$article" />
                        </div>
                    @endforeach
                </div>

                <!-- No Results Message -->
                <div id="no-results" class="row d-none">
                    <div class="col-12 text-center mt-3">
                        <div class="alert alert-info">
                            <p>Nessun articolo trovato con i filtri selezionati.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

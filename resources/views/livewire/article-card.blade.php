{{-- <div>
    <div class="container  py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <img src="https://picsum.photos/200/300" alt="foto">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->category->name ?? 'N/A' }}</p>
                        <p class="card-text">{{ $article->price }}</p>
                    </div>
                    <div>
                        <a class="btn" href="{{ route('article.show', compact('article')) }}">Visualizza tutti gli
                            Articoli di:</a>
                        <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                            class="btn btn-outline-info">{{ $article->category->name }}</a>
                    </div>
                    <form wire:submit='update'>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Modifica</a>
                            <a href="{{ route('article.index') }}" class="btn btn-primary me-2">Indietro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card" style="width: 400px; height: 150px">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="https://picsum.photos/700/400" class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text">{{ $article->category->name ?? 'N/A' }}</p>
                    <p class="card-text">{{ $article->price }}</p>
                    <div>
                        <a class="btn" href="{{ route('article.show', compact('article')) }}">Visualizza tutti gli
                            Articoli di:</a>
                        <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                            class="btn btn-outline-info">{{ $article->category->name }}</a>
                    </div>
                    <form wire:submit='update'>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Modifica</a>
                            <a href="{{ route('article.index') }}" class="btn btn-primary me-2">Indietro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

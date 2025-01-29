<div>
    <div class="container col-12 py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->category->name ?? 'N/A' }}</p>
                        <p class="card-text">{{ $article->price }}</p>
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

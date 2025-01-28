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


                    <!-- Bottoni interattivi --> 
                    <div class="card-footer d-flex justify-content-between right">
                        @if(Route::currentRouteName() == 'article.show')
                            {{-- Nella vista show, mostra solo il bottone "Torna al catalogo" --}}
                            <a href="{{ route('article.index') }}" class="btn btn-primary">Torna al catalogo</a>
                        @else
                            {{-- Nella welcome e index, mostra il bottone "Vedi altro" --}}
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Vedi altro</a>
                        @endif

                        @auth
                            @if(Auth::id() == $article->user_id && Route::currentRouteName() != 'article.show')
                                <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Modifica</a>
                                <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

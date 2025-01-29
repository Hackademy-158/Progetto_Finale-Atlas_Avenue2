{{-- <div class="container m-1">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3 "> --}}
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/700/400" class="card-img-top" alt="immagine">
                <div class="card-body text-center p-0">
                    <h5 class="card-title ">{{$article->title}}</h5>
                    <p class="card-text mb-0">{{$article->description}}</p>
                    <p class="card-text mb-0">Prezzo: {{$article->price}}</p>
                </div>
                <div class="text-center mt-0 pb-2">
                    <a class="text-decoration-none text-dark" href="{{route('article.show', compact('article'))}}">Categoria:</a>
                    <a href="{{route('byCategory', ['category' => $article->category])}}" >{{ $article->category->name }}</a>
                </div>
                <form wire:submit='update'>
                    <div class="card-footer d-flex justify-content-between align-items-center p-3">
                        <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Dettaglio</a>
                        <a href="{{ route('article.index') }}" class="btn btn-primary me-2">Indietro</a>
                    </div>  
                </form>
            </div>    
        {{-- </div>
    </div>
</div>  --}}


{{-- <div class="card" style="width: 400px; height: 150px">
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
        </div> --}}
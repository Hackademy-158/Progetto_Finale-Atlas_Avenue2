<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">Articoli della categoria: {{$category->name}}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->category->name ?? 'N/A' }}</p>
                        <p class="card-text">{{ $article->price }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h3>Non sono ancora stati creati articoli per questa categoria.</h3>
                @auth 
                <a href="{{route ('create.article')}}">Pubblica un articolo</a>
                @endauth
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
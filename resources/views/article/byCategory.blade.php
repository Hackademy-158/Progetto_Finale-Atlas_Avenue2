<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">Articoli della categoria: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($category->articles as $article)
                <div class="col-12 col-md-3">
                    <livewire:article-card :article='$article'>
                </div>
            @empty
                <div class="col-12">
                    <h3>Non sono ancora stati creati articoli per questa categoria.</h3>
                    @auth
                        <a href="{{ route('article.create') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>

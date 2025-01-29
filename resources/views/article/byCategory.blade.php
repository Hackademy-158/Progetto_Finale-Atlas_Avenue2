<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 m-1">
                <h1 class="display-1 text-center">Articoli della categoria: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="container my-2">
            <div class="row justify-content-center">
                @forelse ($category->articles as $article)
                <div class="col-12 col-sm-6 col-md-3">
                    <livewire:article-card :article='$article'>
                </div>
                @empty
                <div class="col-12">
                    <h3 class="text-center">Non sono ancora stati creati articoli per questa categoria.</h3>
                    @auth
                    <p class="text-center">
                        <a href="{{ route('article.create') }}">Pubblica un articolo</a>
                    </p>
                    @endauth
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>

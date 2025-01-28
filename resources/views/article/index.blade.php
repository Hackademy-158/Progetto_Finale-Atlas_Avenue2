<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Articoli</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $article->price }}<small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
        </div>
    </div>
    <div class="col-12">
        <p>Non ci sono articoli</p>
    </div>
    @endforelse
    </div>
    </div>
</x-layout>

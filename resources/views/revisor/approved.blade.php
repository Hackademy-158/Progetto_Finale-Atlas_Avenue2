<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Annunci Approvati</h2>


        <!-- Lista Annunci -->

        <div id="articles-container" class="row justify-content-start g-4">
            @foreach ($articles as $article)
                <div class="col-12 col-sm-6 col-lg-4 article-card" data-title="{{ $article->title }}"
                    data-price="{{ $article->price }}" data-category="{{ $article->category_id }}"
                    data-currency="{{ $article->currency }}">
                    <livewire:article-card :article="$article" />
                </div>
            @endforeach
        </div>

        <!-- Paginazione -->
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
    </div>
    </div>
</x-layout>

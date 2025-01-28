<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Ultimi articoli</h1>
            </div>
        </div>
    </div>
    <div class="container col-12 py-5">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-5 mb-2">
                        <livewire:article-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <p>Non ci sono articoli</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>

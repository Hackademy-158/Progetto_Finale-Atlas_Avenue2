<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Ultimi articoli</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6">
                    <div>
                        <livewire:article-card :article="$article" />
                    </div>
                </div>
        </div>
    @empty
    </div>
    <div class="col-12">
        <p>Non ci sono articoli</p>
    </div>
    @endforelse
    </div>
</x-layout>

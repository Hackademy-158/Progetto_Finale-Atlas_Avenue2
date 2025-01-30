<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-5">
                <h1>Ultimi articoli pubblicati</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-md-3 m-1">
                    <livewire:article-card :article="$article" />
                </div>
            @empty
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mt-3 mb-3">
                            <div class="col-12">
                                @auth
                                    <p>Non ci sono articoli al momento disponibili.</p>
                                    <a class="text-primary" href="{{ route('article.create') }}">Creane Uno!</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mt-3 mb-3">
                                <div class="col-12">
                                    @guest
                                        <p>Non ci sono articoli al momento disponibili.</p>
                                        <a class="text-primary" href="{{ route('register') }}">Creane uno!</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
</x-layout>

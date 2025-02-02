<x-layout>
    <section class="hero-section" style="background-image: url('/img/hero.png'); background-size: cover; background-position: center;">
        <div class="container-fluid position-relative">
            <div class="row vh-100">
                <div class="col-lg-5 hero-content">
                    <h1 class="display-3 fw-bold mb-3">
                        Il tuo <span class="highlight">flusso</span>,<br>
                        il tuo <span class="highlight">shopping</span>
                    </h1>
                    <p class="hero-subtitle mb-4">
                        Scopri un nuovo modo di fare shopping online. Trova tutto ciò che cerchi in un unico posto.
                    </p>
                    <a href="{{ route('article.index') }}" class="hero-button">
                        Shop Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                    </a>
                </div>
            </div>
    </section>

    <div class="container mt-4">
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
    </div>
</x-layout>

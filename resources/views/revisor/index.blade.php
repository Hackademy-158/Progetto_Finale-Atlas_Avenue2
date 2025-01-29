<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center p-2">
                        Revisor dashboard
                    </h1>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-10">
                    <div class="card shadow">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="https://picsum.photos/600/400" class="img-fluid rounded-start h-100 w-100 object-fit-cover" alt="Immagine articolo">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <h2 class="card-title mb-3">{{ $article_to_check->title }}</h2>
                                        <p class="card-subtitle mb-2">
                                            <span class="fw-bold">Venditore:</span> 
                                            @auth {{ $article_to_check->user->name }} @endauth
                                        </p>
                                        <p class="card-subtitle mb-2">
                                            <span class="fw-bold">Prezzo:</span> 
                                            {{ $article_to_check->price }} €
                                        </p>
                                        <p class="card-subtitle mb-3 text-muted">
                                            #{{ $article_to_check->category->name }}
                                        </p>
                                        <p class="card-text">{{ $article_to_check->description }}</p>
                                    </div>

                                    <div class="d-flex justify-content-around mt-4">
                                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                                        </form>

                                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h4 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h4>
                    <a href="{{ route('home') }}" class="mt-5 btn btn-success">Torna all'homepage</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>

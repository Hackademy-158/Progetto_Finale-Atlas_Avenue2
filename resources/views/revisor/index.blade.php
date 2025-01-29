<x-layout>
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif
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
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                                    alt="Immagine segnaposto">
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h4>@auth {{ $article_to_check->user->name }} @endauth
                        </h4>
                        <h4>{{ $article_to_check->price }} €</h4>
                        <h4 class="fs-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        <h6>{{ $article_to_check->description }}</h6>
                    </div>

                    <div class="d-flex pb-4 justify-content-around">
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

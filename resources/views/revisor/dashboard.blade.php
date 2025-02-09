<x-layout>
    <div class="container-fluid">
        <div class="row">
            {{-- SIDEBAR --}}
            <div class="col-md-3 bg-light p-4">
                <div class="sidebar">
                    <h5 class="mb-4">Dashboard Revisore</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="{{ route('revisor.pending') }}"
                            class="d-flex align-items-center text-decoration-none text-dark">
                            <i class="bi bi-hourglass text-warning me-2"></i>
                            Annunci in Attesa
                            @if (App\Models\Article::revisorPendingRequests() > 0)
                            <span
                            class="badge bg-danger ms-2">{{ App\Models\Article::revisorPendingRequests() }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('revisor.approved') }}?status=1"
                        class="d-flex align-items-center text-decoration-none text-dark">
                        <i class="bi bi-check-circle text-success me-2"></i>
                        Annunci Approvati
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('revisor.refused') }}"
                    class="d-flex align-items-center text-decoration-none text-dark">
                    <i class="bi bi-x-circle text-danger me-2"></i>
                    Annunci Respinti
                </a>
            </li>
        </ul>
    </div>
</div>

{{-- CONTENUTO PRINCIPALE --}}
<div class="col-md-9 p-4">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">In Attesa</h5>
                    <p class="card-text display-4">
                        {{ App\Models\Article::where('is_accepted', null)->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Approvati</h5>
                        <p class="card-text display-4">
                            {{ App\Models\Article::where('is_accepted', true)->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Respinti</h5>
                            <p class="card-text display-4">
                                {{ App\Models\Article::where('is_accepted', false)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Ultimi annunci da revisionare --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Ultimi Annunci da Revisionare</h5>
                        @if ($article_to_check)
                        <span class="badge bg-primary">{{ App\Models\Article::revisorPendingRequests() }} in
                            attesa</span>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            @if ($article_to_check)
                            <div class="row">
                                <div class="col-12">
                                    @if ($article_to_check->images->count())
                                    @foreach ($article_to_check->images as $key => $image)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-4 mb-4">
                                                <img src="{{ $image->getUrl(800, 800) }}"
                                                class="img-fluid rounded shadow"
                                                alt="Immagine {{ $key + 1 }} dell'articolo ' {{ $article_to_check->title }}">
                                            </div>
                                            <div class="col-12 col-md-4 ps-3">
                                                <div class="card-body">
                                                    <h5>Labels</h5>
                                                    @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                    #{{ $label }},
                                                    @endforeach
                                                    @else
                                                    <p class="fst-italic">No Labels</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 ps-3">
                                                <div class="card-body">
                                                    <h5 class="">Ratings</h5>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->adult }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">adult</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->violence }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">violence</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->spoof }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">spoof</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->racy }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">racy</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class=" text-center mx-auto {{ $image->medical }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-10">medical</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        @for ($i = 0; $i < 6; $i++)
                        <img src="https://picsum.photos/300/200" class="img-fluid rounded" alt="Placeholder">
                        @endfor
                        @endif
                    </div>
                    <div class="col-12 text-center">
                        <h5>{{ $article_to_check->title }}</h5>
                        <p>{{ Str::limit($article_to_check->description, 150) }}</p>
                        <div class="mb-3">
                            <span class="badge bg-secondary">{{ $article_to_check->category->name }}</span>
                            <span class="badge bg-info">€{{ $article_to_check->price }}</span>
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <form action="{{ route('revisor.accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-lg"></i> Approva
                                </button>
                            </form>
                            <form action="{{ route('revisor.reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-x-lg"></i> Rifiuta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="bi bi-check-circle text-success" style="font-size: 3rem;"></i>
                    <p class="mt-3">Non ci sono annunci da revisionare al momento.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</x-layout>

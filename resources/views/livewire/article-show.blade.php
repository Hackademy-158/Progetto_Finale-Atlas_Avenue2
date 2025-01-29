<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-3 mt-4">
            <div class="card" style="width: 18rem;">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body text-center p-0">
                    <h5 class="card-title ">{{ $article->title }}</h5>
                    <p class="card-text mb-0">{{ $article->description }}</p>
                    <p class="card-text mb-0">Prezzo: {{ $article->price }}</p>
                </div>
                <div class="text-center mt-0 pb-2">
                    <a class="text-decoration-none text-dark"
                        href="{{ route('article.show', compact('article')) }}">Categoria:</a>
                    <a
                        href="{{ route('byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
                </div>
                <a class="btn  btn-primary"  href="{{route('article.index')}}">Indietro</a>
            </div>
        </div>
    </div>
</div>


<div class="container mt-2">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 ">
        <div class="col">
            <div class="product-grid p-0 ">
                <div class="product-image">
                    <a class="image">
                        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/700/600'}}" class="img-fluid rounded-bottom-1 card-img-top" alt="Immagine dell'articolo: {{ $article->title }}">
                    </a>
                    <a href="{{ route('article.show', compact('article')) }}">
                        <span class="product-discount-label">{{ $article->category->name }}</span>
                    </a>
                    <a href="{{ route('article.show', compact('article')) }}" class="add-to-cart">Scopri di più</a>
                </div>
                <div class="product-content text-center ">
                    <h3 class="title"><a href="#">{{ $article->title }}</a></h3>
                    <div class="rating">
                        @for ($i = 0; $i < $article->rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    </div>
                    <div class="price">{{ $article->price }} {{ $article->currency_symbol }}</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success">
                            <i class="bi bi-cart-plus me-2"></i> Aggiungi al Carrello
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

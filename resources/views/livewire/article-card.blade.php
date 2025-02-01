<div class="col-12">
    <div class="row m-0">
        <div class="product-grid p-0">
            <div class="product-image">
                <a href="#" class="image">
                    <img src="https://picsum.photos/700/600">
                </a>
                <span class="product-discount-label">Sale</span>
                <ul class="product-links">
                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
                <a href="" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">{{$article->title}}</a></h3>
                <div class="price">{{$article->price}}</div>
            </div>
        </div>
    </div>
</div>    

    {{-- <div class="card" style="width: 18rem;">
    <img src="https://picsum.photos/700/400" class="card-img-top" alt="immagine">
    <div class="card-body text-center p-0">
        <h5 class="card-title ">{{$article->title}}</h5>
        <p class="card-text mb-0">{{$article->description}}</p>
        <p class="card-text mb-0">Prezzo: {{$article->price}}</p>
    </div>
    <div class="text-center mt-0 pb-2">
        <a class="text-decoration-none text-dark" href="{{route('article.show', compact('article'))}}">Categoria:</a>
        <a href="{{route('byCategory', ['category' => $article->category])}}" >{{ $article->category->name }}</a>
    </div>
    <form wire:submit='update'>
        <div class="card-footer d-flex justify-content-between align-items-center p-3">
            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Dettaglio</a>
            <a href="{{ route('article.index') }}" class="btn btn-primary me-2">Indietro</a>
        </div>  
    </form>
</div>     --}}

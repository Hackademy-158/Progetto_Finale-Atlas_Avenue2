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
                <a href="{{ route('article.show', compact('article')) }}" class="add-to-cart">Scopri di più</a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">{{$article->title}}</a></h3>
                <div class="rating">
                    @for ($i = 0; $i < $article->rating; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </div>
                <div class="price">{{$article->price}} {{$article->currency_symbol}}</div>
            </div>
        </div>
    </div>
</div>    
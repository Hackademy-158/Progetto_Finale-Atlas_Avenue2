<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="#" class="image">
                    <img src="images/img-1.jpg">
                </a>
                <span class="product-discount-label">BestBuy</span>
                <ul class="product-links">
                    <li><a href="#"><<i class="fa-duotone fa-regular fa-cart-shopping"></i>></a></li>
                    <li><a href="#"><i class="fa-solid fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-shuffle"></i></a></li>
                </ul>
                <a href="" class="add-to-cart">Aggiungi al carrello</a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">{{ $category->name }}</a></h3>
                <div class="price">{{ $category->price }}</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3 col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="#" class="image">
                    <img src="images/img-2.jpg">
                </a>
                <ul class="product-links">
                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
                <a href="" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">Men's Jacket</a></h3>
                <div class="price">$75.55</div>
            </div>
        </div>
    </div>
</div> --}}
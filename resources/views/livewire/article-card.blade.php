<div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->description }}</p>
            <p class="card-text">{{ $article->category->name ?? 'N/A' }}</p>
            <p class="card-text">{{ $article->price }}</p>
        </div>
    </div>
</div>

<x-layout>
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> {{ $article->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Descrizione:</h4>
            </div>
            <div class="col-12">
                <p>{{ $article->description }}</p>
                <p>{{ $article->price }}</p>
            </div>
        </div>
    </div>
</div>
</x-layout>
<x-layout>
    @if (session()->has('errorMessage'))
    <div class="alert alert-danger text-center rounded w-50">
        {{ session('errorMessage') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Ultimi articoli</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
            <div class="col-12 col-sm-6 col-md-3 m-1"> 
                <livewire:article-card :article="$article" />
            </div>
            @empty
            <div class="col-12">
                <p>Non ci sono articoli</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
</x-layout>

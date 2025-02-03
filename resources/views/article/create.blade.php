<x-layout>
    @auth
    <div class="position-absolute top-0 start-0 w-100" style="min-height: 100vh; background-image: url('{{ asset('img/article/article-create-bg-view.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-8 mx-auto article-create-column">
                    <div class="card mb-3 shadow-lg border-0 rounded-4">
                        <div class="card-body p-0">
                            <livewire:article-create />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @guest
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h1 class="mt-5">Devi essere loggato per creare un annuncio!</h1>
                <a class="btn btnRevBuy my-2 mx-1" href="{{ route('login') }}">Accedi</a>
                <a class="btn btnRevBuy my-2 mx-1" href="{{ route('register') }}">Registrati</a>
            </div>
        </div>
    </div>
    @endguest
</x-layout>

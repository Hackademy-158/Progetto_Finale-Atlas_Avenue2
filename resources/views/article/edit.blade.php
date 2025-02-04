<div>
    <x-layout>
        @auth
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="mt-5">Modifica il tuo annuncio!</h1>
                </div>
            </div>
        </div>
        <div class="container col-12 py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 mt-4">
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <livewire:article-edit :article='$article' />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
        @guest
        <div class="container">
            <div class="row vh-100 jsutify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h1 class="mt-5">Devi essere loggato per modificare un annuncio!</h1>
                    <a class="btn btn-success my-2 mx-1" href="{{ route('login') }}">Accedi</a>
                    <a class="btn btn-success my-2 mx-1" href="{{ route('register') }}">Registrati</a>
                </div>
            </div>
        </div>
        @endguest
    </x-layout>
</div>

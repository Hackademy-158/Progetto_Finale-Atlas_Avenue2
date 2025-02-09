<x-layout>
    @auth
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <livewire:article-create />
                </div>
            </div>
        </div>

    @endauth
    @guest
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h1 class="mt-5">Devi essere loggato per creare un annuncio!</h1>
                    <a class="btn btn-success my-2 mx-1" href="{{ route('login') }}">Accedi</a>
                    <a class="btn btn-success my-2 mx-1" href="{{ route('register') }}">Registrati</a>
                </div>
            </div>
        </div>
    @endguest
</x-layout>

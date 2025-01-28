<div>
    <x-layout>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="mt-5">Crea un nuovo annuncio!</h1>
                </div>
            </div>
        </div>
        <div class="container col-12 py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 mt-4">
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <livewire:article-edit :article="$article" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>
</div>

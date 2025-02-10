@auth
@if (Auth::id() === $article->user_id)
<div class="container col-12 py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form wire:submit="update">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="title" wire:model.live="title"
                        placeholder="es. TV, fiat 500, iPhone">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label text-sm">Inserisci Immagine</label>
                    <input type="file" wire:model.live="temporary_images" multiple
                        class="form-control shadow text-sm @error('temporary_images.*') is-invalid @enderror"
                        placeholder="Img/">
                    @error('temporary_images.*')
                        <p class="fst-italic text-danger text-xs">{{ $message }}</p>
                    @enderror
                    @error('temporary_images')
                        <p class="fst-italic text-danger text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <p>Vecchia Immagine</p>
                <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 800) : 'https://picsum.photos/700/600'}}" alt="Immagine di {{$article->title}}" style="width: 100%;" class="mb-3">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <input type="text" class="form-control" id="description" wire:model.live="description">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria:</label>
                    <select class="form-control" id="category" wire:model.live="category_id">
                        <option value="">Seleziona una categoria</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option disabled>Nessuna categoria disponibile</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" step="0.01" id="price" wire:model.live="price"
                            placeholder="0.00">
                        <select class="form-select" id="currency" wire:model.live="currency">
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @error('currency')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-success me-2">Modifica Annuncio</button>
                    <button type="button" wire:click='destroy' class="btn btn-danger">Elimina</button>
                </div>
                <a class="btn btn-secondary mt-3" href="{{ route('article.show', compact('article')) }}">Indietro</a>
            </form>
        </div>
    </div>
</div>
@else
    <div class="container col-12 py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">Non puoi modificare questo annuncio</h1>
                <a class="btn btn-secondary mt-3" href="{{ route('article.show', compact('article')) }}">Indietro</a>
            </div>
        </div>
    </div>
@endif
@endauth

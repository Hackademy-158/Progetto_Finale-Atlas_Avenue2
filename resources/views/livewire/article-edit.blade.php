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
                <button type="submit" class="btn btn-success">Modifica Annuncio</button>
                <a wire:click='destroy' href="{{ route('article.index') }}" class="btn btn-primary">Elimina</a>
            </form>
        </div>
    </div>
</div>

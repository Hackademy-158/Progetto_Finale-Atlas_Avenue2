<x-layout>
    <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="container py-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5 ">
                            <h1 class="card-title text-center mb-4">Registrati</h1>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Nome Utente</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Inserisci il tuo nome">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="esempio@email.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Inserisci la password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Conferma Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Conferma la password">
                                </div>

                                <button type="submit" class="btn btnRevBuy w-100 mb-3 py-2">
                                    Registrati
                                </button>

                                <p class="text-center mb-0">
                                    Sei già registrato?
                                    <a href="{{ route('login') }}" class="text-decoration-none" style="color: #157347">
                                        Accedi
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Registrati</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 rounded shadow p-2 w-50 ">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Utente</label>
                        <input type="text" class="form-control" id="name" name='name'>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name='email'>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name='password'>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">conferma password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name='password_confirmation'>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                    <span class="ms-3">Sei già registrato? <a class="text-dark"
                            href="{{ route('login') }}">Accedi</a></span>
            </div>
        </div>
    </div>

</x-layout>

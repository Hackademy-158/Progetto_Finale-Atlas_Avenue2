<x-layout>
    <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="container py-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5 ">
                            <h1 class="card-title text-center mb-4">{{__('ui.register.title')}}</h1>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">{{__('ui.register.name')}}</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="{{__('ui.register.placeholderName')}}" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="{{__('ui.register.placeholderEmail')}}" id="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{__('ui.register.placeholderPassword')}}" id="password">
                                    <button type="button" id="togglePassword" class="btn btn-success mt-2">{{__('ui.register.buttonShow')}}</button>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">{{__('ui.register.confirm_password')}}</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="{{__('ui.register.placeholderConfirmPassword')}}" id="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-success w-100 mb-3 py-2">
                                    {{__('ui.register.title')}}
                                </button>

                                <p class="text-center mb-0">
                                    {{__('ui.register.already')}}
                                    <a href="{{ route('login') }}" class="text-decoration-none" style="color: #157347">
                                        {{__('ui.login.title')}}
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

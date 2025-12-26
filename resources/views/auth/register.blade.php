@extends('layouts.app')

@section('main')
<div class="container-fluid">
    <div class="row min-vh-100 align-items-center">

        <!-- LEFT IMAGE (optional – like eBay style) -->
        <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center bg-light">
            <img src="{{ asset('images\banners\banner2.png') }}" class="img-fluid" style="max-width: 75%;" alt="Register">
        </div>

        <!-- RIGHT FORM -->
        <div class="col-md-6 d-flex justify-content-center">
            <div style="width: 420px;">

                <h1 class="fw-bold mb-4">Create an account</h1>

                <form method="POST" action="/store">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Full name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="form-label">Confirm password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control form-control-lg"
                            placeholder="Confirm password">
                    </div>

                    <!-- Terms -->
                    <p class="small text-muted mb-4">
                        By selecting Create account, you agree to our
                        <a href="#" class="text-decoration-none">User Agreement</a>
                        and
                        <a href="#" class="text-decoration-none">Privacy Policy</a>.
                    </p>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-dark w-100 py-2">
                        Create account
                    </button>

                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        <small>
                            Already have an account?
                            <a href="{{ url('login') }}" class="text-decoration-none fw-semibold">
                                Sign in
                            </a>
                        </small>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
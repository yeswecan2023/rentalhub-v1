@extends('layouts.app')

@section('main')
<div class="container-fluid min-vh-100">
    <div class="row min-vh-100 align-items-center">

        <!-- LEFT SECTION -->
        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center px-5">
            <h2 class="fw-bold mb-3 text-primary">Rent</h2>
            <h1 class="fw-bold mb-4">
                anything, anytime
            </h1>

            <!-- Illustration (optional image) -->
            <img src="\images\banners\banner1.png"
                alt="Illustration"
                class="img-fluid"
                style="max-width: 420px;">
        </div>

        <!-- RIGHT SECTION -->
        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card border-0 shadow-sm" style="width: 420px;">
                <div class="card-body p-4">

                    <h5 class="text-center fw-semibold mb-4">
                        Log in to RentalHub
                    </h5>

                    <!-- Social Login (UI only) -->
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-google me-2"></i> Continue with Google
                        </button>
                        <button class="btn btn-primary">
                            <i class="bi bi-facebook me-2"></i> Continue with Facebook
                        </button>
                        <button class="btn btn-dark">
                            <i class="bi bi-apple me-2"></i> Continue with Apple
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="d-flex align-items-center my-3">
                        <hr class="flex-grow-1">
                        <span class="px-2 text-muted small">or</span>
                        <hr class="flex-grow-1">
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ url('authenticate') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label small">Email address</label>
                            <input type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-2">
                            <label class="form-label small">Password</label>
                            <input type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password">
                        </div>

                        <div class="text-end mb-3">
                            <a href="#" class="small text-decoration-none">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark">
                                Log in
                            </button>
                        </div>
                    </form>

                    <p class="text-center small mb-0">
                        Don’t have an account?
                        <a href="{{ url('register') }}" class="text-decoration-none">
                            Sign up
                        </a>
                    </p>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
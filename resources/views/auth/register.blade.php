@extends('layouts.app')
@section('main')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 420px;">
        <div class="card-body">

            <h4 class="text-center mb-4">
                <i class="bi bi-person-plus"></i> Register
            </h4>

            <form method="POST" action="/store">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter your name" value="{{ old('name') }}">
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email" value="{{ old('email') }}">
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter password" required>
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" placeholder="Re-enter password" required>
                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        Register
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-3">
                    <small>
                        Already have an account?
                        <a href="{{ url('login') }}">Login</a>
                    </small>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
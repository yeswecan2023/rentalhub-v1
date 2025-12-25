@extends('layouts.app')
@section('main')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 380px;">
        <div class="card-body">

            <h4 class="text-center mb-4">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </h4>

            <form method="POST" action="authenticate">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email">
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter password" required>
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
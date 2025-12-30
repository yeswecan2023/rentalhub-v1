@extends('layouts.app')

@section('main')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold">Latest Rentals</h5>
    </div>

    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <a href="{{ url('products/'.$product->id.'/show') }}" class="text-decoration-none text-dark d-block h-100">
                <div class="card h-100 border-0 shadow-sm rental-card">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('products/'.$product->image) }}"
                            class="card-img-top rental-img"
                            alt="{{ $product->name }}">
                        <span class="wishlist-icon">
                            <i class="bi bi-heart"></i>
                        </span>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-1">₹ {{ number_format($product->price) }}</h6>
                        <p class="mb-1 text-truncate">
                            {{ $product->name }}
                        </p>
                        <p class="text-muted mb-0">
                            <i class="bi bi-geo-alt-fill"></i>
                            <small>{{ $product->location }}</small>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
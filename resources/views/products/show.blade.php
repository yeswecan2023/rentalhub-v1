@extends('layouts.app')
@section('main')
<h5><i class="bi bi-box-seam me-2"></i>Product Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">View Product</li>
    </ol>
</nav>
<div class="row mt-4">
     <div class="col-md-8">
<div class="card product-show-card">
    <img src="{{ asset('products/'.$product->image) }}"
         alt="{{ $product->name }}"
         class="product-show-img" />

    <div class="card-body">
        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
        <div class="d-flex gap-5 my-3 text-muted">
            <!-- Location -->
            <div class="d-flex align-items-start gap-2">
                <i class="bi bi-geo-alt fs-5"></i>
                <div>
                    <small class="d-block">Location</small>
                    <strong class="text-dark">
                        {{ $product->location }}
                    </strong>
                </div>
            </div>

            <!-- Posting Date -->
            <div class="d-flex align-items-start gap-2">
                <i class="bi bi-calendar-event fs-5"></i>
                <div>
                    <small class="d-block">Posting date</small>
                    <strong class="text-dark">
                        {{ $product->created_at->format('d-M-Y') }}
                    </strong>
                </div>
            </div>
        </div>

        <p class="card-text text-secondary">{{ $product->description }}</p>

        <p class="fw-semibold">
            M.R.P
            <small class="text-danger text-decoration-line-through">
                Rs.{{ $product->mrp }}
            </small>
        </p>

        <p class="fw-semibold">
            Renting Price
            <small class="text-success">
                Rs.{{ $product->price }}
            </small>
        </p>
    </div>
</div>
</div>
<!-- Right: Seller / Deal Card -->
    <div class="col-md-4">
        <div class="deal-card">

            <div class="price-section mb-3">
                <h1 class="price">₹ {{ $product->price }}</h1>
            </div>

            <button class="btn btn-primary w-100 fw-semibold mb-4">
                Make a Deal
            </button>

            <!-- Seller Info -->
            <div class="seller-card d-flex align-items-center gap-3">
                <img src="{{ asset('images/avatar/profile.jpg') }}"
                     class="seller-avatar"
                     alt="Seller">
                <div>
                    <div class="fw-semibold">
                        {{ $product->user->name ?? 'Lakshmi Stores' }}
                    </div>

                    <!-- Star Rating -->
                    <div class="rating">
                        ★★★★☆ <span class="rating-text">4.2</span>
                    </div>

                    <small class="text-muted">
                        Member since {{ optional($product->user)->created_at?->format('M Y') ?? '2024' }}
                    </small>
                </div>
            </div>

        </div>
    </div>

</div>
</div>

@endsection
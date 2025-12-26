<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentalHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar px-4">
        <a class="navbar-brand fw-semibold" href="{{ url('home') }}">RentalHub</a>
        @auth
        <div class="ms-auto d-flex align-items-center">
            <!-- Notification Icon -->
            <a href="#" class="me-4 text-dark position-relative">
                <i class="bi bi-bell fs-5"></i>
                <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span> -->
            </a>

            <a href="{{ url('products/create') }}" class="me-4 btn btn-outline-primary rounded-pill">
                <i class="bi bi-plus-circle"></i> Add For Rental
            </a>
            <!-- User Dropdown -->
            <div class="dropdown me-4">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4"></i>
                    <span class="ms-2">{{ Auth::user()->name }}</span>
                </a>



                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                    <li>
                        <a href="{{ url('myAds') }}" class="dropdown-item fw-semibold fs-6">
                            <i class="bi bi-card-list me-2"></i> My Ads
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
    </nav>
    <div class="container mt-5">
        <div class="row">
            @if($message = session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('main')
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
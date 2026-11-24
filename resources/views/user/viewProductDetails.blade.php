<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QRAFTIO | Premium Fashion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
    @media (min-width: 992px) {
        #qraftioNavbar {
            display: flex !important;
            visibility: visible !important;
            flex-basis: auto;
            flex-grow: 1;
        }

        #qraftioNavbar .navbar-nav {
            display: flex !important;
            flex-direction: row;
        }
    }

    #qraftioNavbar.show {
        visibility: visible !important;
    }

    #qraftioNavbar .nav-link {
        color: #171717 !important;
        visibility: visible !important;
    }
</style>
</head>
@include("layouts.nav")

<section class="container py-5">

    <!-- Breadcrumb -->
    <div class="mb-4">
        <a href="/" class="text-decoration-none text-secondary">
            Home
        </a>
        <i class="bi bi-chevron-right small mx-2 text-secondary"></i>
        <span class="text-dark fw-semibold">Product Details</span>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row g-5 align-items-center">

        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="bg-light rounded-4 p-4 text-center border">
                <img src="{{ asset('storage/'.$product->image) }}"
                     alt="{{ $product->product_name }}"
                     class="img-fluid"
                     style="height: 430px; width: 100%; object-fit: contain;">
            </div>
        </div>

        <!-- Product Information -->
        <div class="col-lg-6">

            <span class="badge bg-dark-subtle text-dark px-3 py-2 rounded-pill mb-3">
                QRAFTIO EXCLUSIVE
            </span>

            <h1 class="fw-bold text-dark mb-3">
                {{ $product->product_name }}
            </h1>

            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </span>
                <small class="text-secondary">Premium Collection</small>
            </div>

            <h2 class="fw-bold text-dark fs-2  mb-4">
                ${{ number_format($product->price, 2) }}
            </h2>

            <hr class="my-4">

            <h5 class="fw-bold text-dark mb-3">Product Description</h5>

            <p class="text-secondary lh-lg mb-4">
                {{ $product->description }}
            </p>

            <!-- Buttons -->
            <div class="d-flex flex-wrap gap-3 mb-4">

                <button class="btn btn-outline-dark btn-lg px-5 py-3 rounded-3 fw-semibold">
                    <i class="bi bi-cart-plus me-2"></i>
                   <a href="{{ route("addToCart", $product->id) }}">Add to Cart</a>
                </button>

                <button class="btn btn-outline-dark btn-lg px-4 py-3 rounded-3">
                    <i class="bi bi-heart"></i>
                </button>

            </div>

            <hr class="my-4">

            <!-- Benefits -->
            <div class="row g-3">

                <div class="col-12 d-flex align-items-center gap-3">
                    <div class="bg-light rounded-3 p-3">
                        <i class="bi bi-truck fs-4 text-dark"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Fast Delivery</h6>
                        <small class="text-secondary">Reliable delivery to your doorstep.</small>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-center gap-3">
                    <div class="bg-light rounded-3 p-3">
                        <i class="bi bi-shield-check fs-4 text-dark"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Quality Guaranteed</h6>
                        <small class="text-secondary">Shop with confidence at QRAFTIO.</small>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-center gap-3">
                    <div class="bg-light rounded-3 p-3">
                        <i class="bi bi-headset fs-4 text-dark"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Customer Support</h6>
                        <small class="text-secondary">We're here to help you.</small>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@include('layouts.footer')
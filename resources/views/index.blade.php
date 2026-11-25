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
.category-card {
    height: 300px;
    background: #f5f5f5;
    cursor: pointer;
}

.category-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.category-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0, 0, 0, 0.8),
        rgba(0, 0, 0, 0.05)
    );
}

.category-content {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 22px;
    width: 100%;
}

.category-card:hover .category-image {
    transform: scale(1.08);
}

.category-content h5 {
    transition: transform 0.3s ease;
}

.category-card:hover .category-content h5 {
    transform: translateY(-4px);
}

@media (max-width: 576px) {
    .category-card {
        height: 200px;
    }

    .category-content {
        padding: 12px;
    }

    .category-content h5 {
        font-size: 15px;
    }
}
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
<div class="bg-black text-white text-xs font-medium py-2 px-4 text-center tracking-wider uppercase">
        Free global shipping on orders over $75 • Use code <span class="underline font-bold">QRAFT10</span> for 10% off
    </div>
@include('layouts.nav')
<body class="font-sans bg-gray-50 text-gray-900 antialiased selection:bg-black selection:text-white">
    <main class="p-5">
    <section class="relative bg-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center min-h-[650px]">

                <!-- Left Content -->
                <div class="py-16 md:py-20 relative z-10">

                    <p class="uppercase tracking-[5px] text-xs font-bold mb-6 text-gray-500">
                        Premium Quality Apparel
                    </p>

                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight leading-tight text-black">
                        Wear Better.
                        <br>
                        <span class="text-gray-400 italic">Live Bolder.</span>
                    </h1>

                    <p class="text-gray-600 text-lg mt-6 max-w-md leading-relaxed">
                        Elevating everyday essentials with meticulous craftsmanship
                        and premium sustainable fabrics.
                    </p>

                    <div class="mt-9">
                        <a href="#products"
                           class="inline-flex items-center gap-4 bg-black text-white px-8 py-4 rounded-full font-semibold hover:bg-gray-800 transition duration-300">
                            Shop the Collection
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Features -->
                    <div class="flex flex-wrap gap-8 mt-14 text-sm text-gray-700">

                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-truck-fast text-2xl"></i>
                            <span>Free Shipping<br>Over $75</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-shield-halved text-2xl"></i>
                            <span>Secure<br>Checkout</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-leaf text-2xl"></i>
                            <span>Sustainable<br>Fabrics</span>
                        </div>

                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative h-full min-h-[500px] md:min-h-[650px]">

                    <img
                        src="https://cdn.mos.cms.futurecdn.net/DGAPyu7it62m6gJiWX5MkY.jpg"
                        alt="Premium Fashion Collection"
                        class="absolute inset-0 w-full h-full object-cover object-center"
                    >

                    <div class="absolute inset-0 bg-black/5"></div>

                </div>

            </div>
        </div>
    </section>
    <section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <section class="container py-5">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <span class="text-uppercase text-secondary small fw-semibold" style="letter-spacing: 3px;">Explore Collections</span>
            <h2 class="fw-bold mt-2 mb-0">Shop by Category</h2>
            <p class="text-secondary mt-2 mb-0">Discover products that match your style.</p>
        </div>
        <a href="#" class="text-dark text-decoration-none fw-semibold">
            View All <i class="bi bi-arrow-right"></i>
        </a>
    </div>

    <div class="row g-4">
        @foreach ($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none">
                    <div class="category-card position-relative overflow-hidden rounded-3">
                        <img
                            src="{{ asset('storage/' . $category->image) }}"
                            alt="{{ $category->category_name }}"
                            class="category-image"
                        >

                        <div class="category-overlay"></div>

                        <div class="category-content">
                            <h5 class="text-white fw-bold mb-2">
                                {{ $category->category_name }}
                            </h5>
                            <span class="text-white small">
                                Explore Collection <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

        <!-- Heading -->
        <div class="text-center mb-14">
            <p class="text-xs font-bold tracking-[5px] text-gray-400 uppercase mb-3">
                Discover Our Collection
            </p>

            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-black">
                LATEST PRODUCTS
            </h1>

            <div class="w-16 h-1 bg-black mx-auto mt-5"></div>

            <p class="text-gray-500 mt-5 text-sm">
                Explore our newest arrivals, crafted for everyday style.
            </p>
        </div>
        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($products as $product)

                <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl transition duration-500">

                    <!-- Product Image -->
                    <div class="relative overflow-hidden bg-gray-100 aspect-[3/4]">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->product_name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                        >

                        <span class="absolute top-4 left-4 bg-black text-white text-[10px] font-bold tracking-wider px-3 py-2 uppercase">
                            New Arrival
                        </span>

                        <button class="absolute bottom-4 right-4 bg-white w-11 h-11 rounded-full shadow-md flex items-center justify-center hover:bg-black hover:text-white transition">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                    </div>

                    <!-- Product Details -->
                    <div class="p-5">

                        <p class="text-xs text-gray-400 uppercase tracking-widest mb-2">
                            QRAFTIO Collection
                        </p>

                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-gray-500 transition">
                            {{ $product->product_name }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2 leading-relaxed">
                            {{ Str::limit($product->description, 65) }}
                        </p>

                        <!-- Price -->
                        <div class="mt-5 mb-4">
                            <span class="text-xl font-extrabold text-black">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col gap-2">

                            <a href="{{ route('addToCart', $product->id) }}"
                               class="w-full text-center bg-black text-white py-3 text-xs font-bold uppercase tracking-wider hover:bg-gray-800 transition">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                Add to Cart
                            </a>

                            <a href="{{ route('user.viewProduct', $product->id) }}"
                               class="w-full text-center border border-gray-300 text-black py-3 text-xs font-bold uppercase tracking-wider hover:bg-gray-100 transition">
                                View Product
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- View All Products -->
        <div class="text-center mt-14">

            <a href="{{ route('allProducts') }}"
               class="inline-block border border-black px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-black hover:text-white transition duration-300">

                View All Products
                <i class="fa-solid fa-arrow-right ml-2"></i>

            </a>

        </div>

    </div>
</section>  
</main>
 @include('layouts.footer')
</body>
</html>
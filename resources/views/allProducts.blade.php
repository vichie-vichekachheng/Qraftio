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
<div class="bg-black text-white text-xs font-medium py-2 px-4 text-center tracking-wider uppercase">
        Free global shipping on orders over $75 • Use code <span class="underline font-bold">QRAFT10</span> for 10% off
    </div>
@include('layouts.nav')
<body class="font-sans bg-gray-50 text-gray-900 antialiased selection:bg-black selection:text-white">
    <main class="p-5">
    <section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

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
             {{ $products->links() }}
        </div>
        
        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            @foreach ($products as $product)

                <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl transition duration-500">
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
    </div>
</section>  
</main>
 @include('layouts.footer')
</body>
</html>
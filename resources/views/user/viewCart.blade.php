<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRAFTIO | Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: #171717;
        }

        .cart-wrapper {
            max-width: 1200px;
            margin: auto;
            padding: 65px 20px;
        }

        .cart-title {
            font-size: 35px;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table thead {
            border-bottom: 1px solid #e5e5e5;
        }

        .cart-table th {
            padding: 18px 12px;
            color: #737373;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .cart-table td {
            padding: 22px 12px;
            border-bottom: 1px solid #eeeeee;
            vertical-align: middle;
            font-size: 14px;
        }

        .product-image {
            width: 85px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            background: #f5f5f5;
        }

        .product-name {
            font-weight: 700;
            font-size: 15px;
            color: #171717;
        }

        .product-description {
            color: #888;
            font-size: 12px;
            margin-top: 5px;
        }

        .cart-summary {
            background: #fafafa;
            border: 1px solid #eeeeee;
            padding: 28px;
            border-radius: 8px;
        }

        .checkout-btn {
            background: #171717;
            color: white;
            width: 100%;
            padding: 15px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .checkout-btn:hover {
            background: #404040;
            color: white;
        }

        .empty-cart {
            padding: 90px 20px;
            text-align: center;
        }

        .empty-cart i {
            font-size: 65px;
            color: #d4d4d4;
        }

        .shop-btn {
            display: inline-block;
            background: #171717;
            color: white;
            padding: 13px 30px;
            text-decoration: none;
            margin-top: 20px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s;
        }

        .shop-btn:hover {
            background: #404040;
            color: white;
        }

        @media(max-width: 768px) {
            .cart-title {
                font-size: 27px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .cart-table {
                min-width: 750px;
            }
        }
    </style>
</head>

<div class="bg-black text-white text-xs font-medium py-2 px-4 text-center tracking-wider uppercase">
    Free global shipping on orders over $75 • Use code
    <span class="underline font-bold">QRAFT10</span> for 10% off
</div>

@include('layouts.nav')

<body>
    <main class="cart-wrapper">

        <div class="mb-5">
            <span class="text-uppercase text-secondary small fw-semibold" style="letter-spacing: 3px;">
                Your Collection
            </span>
            <h1 class="cart-title mt-2">Shopping Cart</h1>
            <p class="text-secondary small">Review your selected items before checkout.</p>
        </div>

        @if($carts->isEmpty())

            <div class="empty-cart">
                <i class="bi bi-bag-x"></i>
                <h3 class="fw-bold mt-4">Your cart is empty.</h3>
                <p class="text-secondary">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{ route('allProducts') }}" class="shop-btn">
                    EXPLORE PRODUCTS <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

        @else

            <div class="row g-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset('storage/' . $cart->product->image) }}" class="product-image"
                                                    alt="{{ $cart->product->product_name }}">

                                                <div>
                                                    <div class="product-name">
                                                        {{ $cart->product->product_name }}
                                                    </div>
                                                    <div class="product-description">
                                                        {{ $cart->product->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="fw-semibold">
                                            ${{ number_format($cart->product->price, 2) }}
                                        </td>

                                        <td>1</td>

                                        <td>
                                            {{ $cart->product->category->category_name ?? 'Uncategorized' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('user.deleteItem', $cart) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to remove this product?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm text-danger border-0">
                                                    <i class="bi bi-trash3 fs-5"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">

                </div>

            </div>

        @endif

    </main>

    @include('layouts.footer')

</body>

</html>
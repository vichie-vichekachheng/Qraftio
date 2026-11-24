
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $products->product_name }} | Product Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #111;
            color: white;
            min-height: 100vh;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .product-card {
            background-color: #1c1c1c;
            color: white;
        }

        .product-image {
            width: 100%;
            height: 100%;
            min-height: 500px;
            object-fit: cover;
        }

        .product-content {
            padding: 35px;
        }

        .info-box {
            background-color: #252525;
            border: 1px solid #383838;
            border-radius: 12px;
            padding: 15px;
        }

        .info-label {
            color: #999;
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            color: white;
            font-size: 18px;
            font-weight: 600;
        }

        .price {
            color: #28a745;
            font-size: 30px;
            font-weight: bold;
        }

        @media (max-width: 991px) {
            .product-image {
                height: 350px;
                min-height: 350px;
            }

            .product-content {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<div class="container main-container">

    <div class="mb-3">
        <a href="{{ route('admin.viewProduct') }}" class="btn btn-outline-light rounded-pill px-4">
            <i class="bi bi-arrow-left me-2"></i> Back to Products
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden product-card flex-grow-1">

        <div class="row g-0 ">

            <!-- Product Image -->
            <div class="col-lg-6">
                <img src="{{ asset('storage/' . $products->image) }}"
                     alt="{{ $products->product_name }}"
                     class="product-image">
            </div>

            <!-- Product Information -->
            <div class="col-lg-6 d-flex align-items-center">

                <div class="product-content w-100">

                    <span class="badge bg-dark border border-secondary text-light px-3 py-2 mb-3">
                        <i class="bi bi-box-seam me-2"></i>
                        Product #{{ $products->id }}
                    </span>

                    <h1 class="fw-bold display-5 mb-3">
                        {{ $products->product_name }}
                    </h1>

                    <div class="bg-white mb-4" style="width: 60px; height: 4px;"></div>

                    <!-- Price -->
                    <div class="mb-4">
                        <p class="text-secondary mb-1">Product Price</p>
                        <div class="price">
                            ${{ number_format($products->price, 2) }}
                        </div>
                    </div>

                    <!-- Product Information -->
                    <div class="row g-3 mb-4">

                        <div class="col-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-box me-2"></i>Quantity
                                </div>
                                <div class="info-value">
                                    {{ $products->quantity }} Units
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-tag me-2"></i>Product ID
                                </div>
                                <div class="info-value">
                                    #{{ $products->id }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-uppercase text-secondary mb-2">
                            <i class="bi bi-card-text me-2"></i>
                            Product Description
                        </h6>

                        <p class="text-secondary fs-6 lh-lg">
                            {{ $products->description ?? 'No description available for this product.' }}
                        </p>
                    </div>

                    <!-- Stock Status -->
                    <div class="border-top border-secondary pt-3">

                        <div class="d-flex align-items-center gap-2 mb-3">

                            @if($products->quantity > 0)
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                <span class="text-success fw-semibold">In Stock</span>
                            @else
                                <i class="bi bi-x-circle-fill text-danger fs-5"></i>
                                <span class="text-danger fw-semibold">Out of Stock</span>
                            @endif

                        </div>

                        <a href="{{ route('admin.viewProduct') }}"
                           class="btn btn-light px-4 py-2 rounded-3 fw-semibold">
                            <i class="bi bi-arrow-left me-2"></i>
                            Back to Products
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
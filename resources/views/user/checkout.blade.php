<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRAFTIO | Checkout</title>

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

        .form-control {
            border-color: #e5e5e5;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #171717;
            box-shadow: 0 0 0 0.15rem rgba(0, 0, 0, 0.08);
        }

        .payment-option {
            cursor: pointer;
            transition: 0.2s ease;
        }

        .payment-option:has(input:checked) {
            border-color: #171717 !important;
            background: #f8f8f8;
        }

        .payment-option:hover {
            border-color: #171717 !important;
        }

        .checkout-btn {
            transition: 0.2s ease;
        }

        .checkout-btn:hover {
            background: #333;
        }
    </style>
</head>

<body>

    <div class="bg-black text-white text-xs fw-medium py-2 px-4 text-center tracking-wider uppercase">
        Free global shipping on orders over $75 • Use code
        <span class="underline fw-bold">QRAFT10</span> for 10% off
    </div>

    @include('layouts.nav')

    <main class="container py-5">

        <div class="mb-5">
            <h1 class="fw-bold text-uppercase">Checkout</h1>
            <p class="text-secondary">Complete your information to place your order.</p>
        </div>

        <div class="row g-5">

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                    <p class="text-secondary mb-4">
                        Please provide your contact details to complete your order.
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success rounded-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('confirm_order') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="email_address" class="form-label fw-semibold">
                                 Address
                            </label>

                            <input
                                type="text"
                                class="form-control form-control-lg rounded-3"
                                id="email_address"
                                name="address"
                                placeholder="Enter your Address"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="phone_number" class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                class="form-control form-control-lg rounded-3"
                                id="phone_number"
                                name="phone_number"
                                value="{{ old('phone_number') }}"
                                placeholder="+855 12 345 678"
                                required
                            >
                        </div>

                        <hr class="my-4">

                        <h5 class="fw-bold mb-3">Payment Method</h5>

                        <p class="text-secondary small mb-3">
                            Choose your preferred payment method.
                        </p>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="payment-option border rounded-3 p-3 w-100 d-flex align-items-center gap-3">

                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        name="payment_method"
                                        value="ABA Bank"
                                        required
                                    >

                                    <div>
                                        <i class="bi bi-bank fs-4"></i>
                                        <div class="fw-semibold">ABA Bank</div>
                                        <small class="text-secondary">Bank Transfer</small>
                                    </div>

                                </label>
                            </div>

                            <div class="col-md-6">
                                <label class="payment-option border rounded-3 p-3 w-100 d-flex align-items-center gap-3">

                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        name="payment_method"
                                        value="Cash"
                                    >

                                    <div>
                                        <i class="bi bi-cash-stack fs-4"></i>
                                        <div class="fw-semibold">Cash</div>
                                        <small class="text-secondary">Cash on Delivery</small>
                                    </div>

                                </label>
                            </div>

                        </div>

                        <input type="submit" class="checkout-btn btn btn-dark w-100 py-3 rounded-3 fw-semibold mt-4 text-uppercase"
                        value="Confirm Order"
                        >
                           

                        <div class="text-center mt-3">
                            <small class="text-secondary">
                                <i class="bi bi-shield-check me-1"></i>
                                Your information is securely processed.
                            </small>
                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h4 class="fw-bold text-uppercase mb-4">Order Summary</h4>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Subtotal</span>
                        <span class="fw-semibold">$</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-secondary">Shipping</span>
                        <span class="fw-semibold text-success">Free</span>
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Total</h5>
                        <h4 class="fw-bold mb-0">$</h4>
                    </div>

                    <div class="border rounded-3 p-3">

                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-truck fs-5"></i>
                            <span class="fw-semibold small">Free Global Shipping</span>
                        </div>

                        <p class="text-secondary small mb-0">
                            Enjoy free shipping on your order with no additional delivery charges.
                        </p>

                    </div>

                    <div class="text-center mt-4">
                        <small class="text-secondary">
                            <i class="bi bi-shield-check me-1"></i>
                            Secure checkout
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
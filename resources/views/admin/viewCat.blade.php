<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cat->category_name }} | Category Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #111;
            color: white;
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .category-card {
            background-color: #1c1c1c;
            color: white;
            flex: 1;
            min-height: 0;
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-content {
            padding: 35px;
        }

        @media (max-height: 700px) {
            .category-content {
                padding: 20px;
            }

            .category-content h1 {
                font-size: 2rem;
            }

            .category-content p {
                font-size: 1rem !important;
            }

            .page-heading {
                margin-bottom: 15px !important;
            }
        }

        @media (max-width: 991px) {
            body {
                height: auto;
                overflow: auto;
            }

            .main-container {
                height: auto;
            }

            .category-card {
                flex: none;
            }

            .category-image {
                height: 350px;
            }
        }
    </style>
</head>

<body>

    <div class="container main-container">

        <div>
            <a href="{{ route('admin.viewCategory') }}" class="btn btn-outline-light rounded-pill px-4 mb-3">
                <i class="bi bi-arrow-left me-2"></i> Back to Categories
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden category-card">

            <div class="row g-0 h-100">

                <div class="col-lg-6 h-100">
                    <img src="{{ asset('storage/' . $cat->image) }}"
                         alt="{{ $cat->category_name }}"
                         class="category-image">
                </div>

                <div class="col-lg-6 d-flex align-items-center">

                    <div class="category-content w-100">

                        <span class="badge bg-dark border border-secondary text-light px-3 py-2 mb-3">
                            <i class="bi bi-tag me-2"></i> Category #{{ $cat->id }}
                        </span>

                        <h1 class="fw-bold display-4 mb-3">
                            {{ $cat->category_name }}
                        </h1>

                        <div class="bg-white mb-3" style="width: 60px; height: 4px;"></div>

                        <h6 class="fw-bold text-uppercase text-secondary mb-2">
                            About This Category
                        </h6>

                        <p class="text-secondary fs-5 lh-lg mb-3">
                            {{ $cat->description }}
                        </p>

                        <div class="border-top border-secondary pt-3">

                            <div class="d-flex align-items-center gap-3 mb-2">
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                <span class="text-light">Quality product collection</span>
                            </div>

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <i class="bi bi-bag-check-fill text-success fs-5"></i>
                                <span class="text-light">Explore our available products</span>
                            </div>

                            <a href="{{ route('admin.viewCategory') }}"
                               class="btn btn-light px-4 py-2 rounded-3 fw-semibold">
                                <i class="bi bi-arrow-left me-2"></i>
                                Back to Categories
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
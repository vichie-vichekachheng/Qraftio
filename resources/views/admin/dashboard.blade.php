
@extends('admin.maindesign')

@section('dashboard')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h2 class="fw-bold text-white">Dashboard</h2>
        <p class="text-secondary">Welcome to your admin dashboard.</p>
    </div>

    <div class="row g-4">

        <!-- Total Categories -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow rounded-4 p-3"
                 style="background-color: rgba(0,0,0,0.55); border:1px solid gray">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">Total Categories</p>
                            <h2 class="fw-bold text-white mb-0">
                                {{ $categories->count() }}
                            </h2>
                        </div>

                        <div class="rounded-3 p-3 bg-primary bg-opacity-25">
                            <i class="bi bi-grid-fill text-primary fs-2"></i>
                        </div>

                    </div>

                    <hr class="border-secondary">

                    <a href="{{ route('admin.viewCategory') }}"
                       class="text-primary text-decoration-none small">
                        Manage Categories <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>
            </div>
        </div>

        <!-- Total Products -->
           <div class="col-md-6 col-lg-3">
            <div class="card shadow rounded-4 p-3"
                 style="background-color: rgba(0,0,0,0.55); border:1px solid gray">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">Total Products</p>
                            <h2 class="fw-bold text-white mb-0">
                                {{ $products->count() }}
                            </h2>
                        </div>

                        <div class="rounded-3 p-3 bg-success bg-opacity-25">
                            <i class="bi bi-box-seam-fill text-success fs-2"></i>
                        </div>

                    </div>

                    <hr class="border-secondary">

                    <a href="{{ route('admin.viewProduct') }}"
                       class="text-success text-decoration-none small">
                        Manage Products <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow rounded-4 p-3"
                 style="background-color: rgba(0,0,0,0.55); border:1px solid gray">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">Total Users</p>
                            <h2 class="fw-bold text-white mb-0">
                                {{ $users->count() }}
                            </h2>
                        </div>

                        <div class="rounded-3 p-3 bg-success bg-opacity-25">
                            <i class="bi bi-people text-success fs-2"></i>
                        </div>

                    </div>

                    <hr class="border-secondary">

                    <a href="{{ route('admin.viewUser') }}"
                       class="text-success text-decoration-none small">
                        Manage users <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>
            </div>
        </div>
    
         <div class="col-md-6 col-lg-3">
            <div class="card shadow rounded-4 p-3"
                 style="background-color: rgba(0,0,0,0.55); border:1px solid gray">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">Total Orders</p>
                            <h2 class="fw-bold text-white mb-0">
                                {{$orders->count() }}
                            </h2>
                        </div>

                        <div class="rounded-3 p-3 bg-primary bg-opacity-25">
                            <i class="bi bi-cart text-primary fs-2"></i>
                        </div>

                    </div>

                    <hr class="border-secondary">

                    <a href="{{ route('admin.viewCategory') }}"
                       class="text-primary text-decoration-none small">
                        Manage Orders <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection

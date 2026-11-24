@extends('admin.maindesign')

@section('view_products')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Products Management</h3>
                <p class="text-muted mb-0">Manage and monitor all your products.</p>
            </div>

            <a href="{{ route('admin.addProduct') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Product
            </a>
        </div>

        <div class="card border-0 shadow-sm p-3">

            <div class="d-flex justify-content-end">
                <form action="{{ route('admin.searchProduct') }}" method="POST">
                    @csrf

                    <div class="position-relative d-none d-sm-block" style="width: 380px;">
                        <button type="submit"
                            class="btn position-absolute top-50 start-0 translate-middle-y ms-2 border-0 bg-transparent">
                            <i class="bi bi-search text-muted small"></i>
                        </button>

                        <input type="text" class="form-control search-cmd ps-5 rounded-3" name="search_product"
                            placeholder="Search products.....">
                    </div>
                </form>
            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr class="text-muted small">
                            <th class="ps-4">#</th>
                            <th>PRODUCT</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>DESCRIPTION</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($products as $product)

                            <tr>
                                <td class="ps-4 text-muted">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-3">

                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" width="45" height="45"
                                                class="rounded-3 border" style="object-fit: cover;">
                                        @else
                                            <div class="rounded-3 d-flex align-items-center justify-content-center border"
                                                style="width: 55px; height: 45px;">
                                                <i class="bi bi-image text-secondary fs-4"></i>
                                            </div>
                                        @endif

                                        <div>
                                            <div class="fw-semibold">
                                                {{ $product->product_name }}
                                            </div>
                                            <small class="text-muted">
                                                ID: {{ $product->id }}
                                            </small>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <span class="badge bg-info-subtle text-info-emphasis rounded-pill px-3 py-2">
                                        {{ $product->category->category_name ?? 'No Category' }}
                                    </span>
                                </td>

                                <td class="fw-semibold">
                                    ${{ number_format($product->price, 2) }}
                                </td>

                                <td>
                                    @if ($product->quantity > 5)
                                        <span class="badge bg-success-subtle text-success rounded-pill">
                                            <i class="bi bi-check-circle me-1"></i>
                                            {{ $product->quantity }} In Stock
                                        </span>
                                    @elseif ($product->quantity > 0)
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            {{ $product->quantity }} Low Stock
                                        </span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger rounded-pill">
                                            Out of Stock
                                        </span>
                                    @endif
                                </td>

                                <td class="text-muted">
                                    {{ Str::limit($product->description, 35) }}
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.showProduct', $product->id) }}" class="btn btn-sm border"
                                            title="View">
                                            <i class="bi bi-eye text-primary"></i>
                                        </a>

                                        <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-sm border"
                                            title="Edit">
                                            <i class="bi bi-pencil-square text-warning"></i>
                                        </a>

                                        <form action="{{ route('admin.deleteProduct', $product) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm border" title="Delete">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-box-seam display-4 text-muted"></i>
                                    <h6 class="mt-3 fw-semibold">No Products Found</h6>
                                    <p class="text-muted small">
                                        Start by adding your first product.
                                    </p>

                                    <a href="{{ route('admin.addProduct') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-lg me-1"></i> Add Product
                                    </a>
                                </td>
                            </tr>

                        @endforelse


                    </tbody>
                </table>
            </div>

        </div>
        <div class="p-3">
            {{ $products->links() }}
        </div>

    </div>

    </div>

@endsection
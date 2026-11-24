
@extends('admin.maindesign')

@section('add_products')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-white mb-1">Edit Product</h3>
            <p class="text-secondary mb-0">Update your product information.</p>
        </div>

        <a href="{{ route('admin.viewProduct') }}" class="btn btn-outline-light btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="card border-0 shadow rounded-3"
         style="max-width: 700px; background-color: #1c1c1c; color: white;">

        <div class="card-header bg-transparent border-secondary py-3">
            <h6 class="mb-0 fw-semibold">
                <i class="bi bi-pencil-square me-2"></i> Product Information
            </h6>
        </div>

        <div class="card-body p-4">

            @if (session('success'))
                <div class="alert alert-success py-2">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.updateProduct', $products->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="product_name"
                           class="form-control bg-dark text-white border-secondary"
                           placeholder="Enter product name"
                           value="{{ old('product_name', $products->product_name) }}"
                           required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" step="0.01" name="price"
                               class="form-control bg-dark text-white border-secondary"
                               placeholder="Enter price"
                               value="{{ old('price', $products->price) }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity"
                               class="form-control bg-dark text-white border-secondary"
                               placeholder="Enter quantity"
                               value="{{ old('quantity', $products->quantity) }}"
                               required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id"
                            class="form-select bg-dark text-white border-secondary"
                            required>

                        <option value="">Select Category</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $products->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control bg-dark text-white border-secondary"
                              rows="3"
                              placeholder="Enter product description">{{ old('description', $products->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Product Image</label>

                    <div class="mb-3">
                        @if($products->image)
                            <img src="{{ asset('storage/' . $products->image) }}"
                                 class="rounded-3 border border-secondary"
                                 style="width: 110px; height: 90px; object-fit: cover;">
                        @else
                            <p class="text-secondary small">No image available.</p>
                        @endif
                    </div>

                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" id="image" name="image"
                           class="form-control bg-dark text-white border-secondary"
                           accept="image/*">

                    <small class="text-secondary">Leave empty to keep the current image.</small>
                </div>

                <hr class="border-secondary">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.viewProduct') }}"
                       class="btn btn-outline-secondary btn-sm px-3">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-warning btn-sm px-3">
                        <i class="bi bi-check-circle me-1"></i> Update Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
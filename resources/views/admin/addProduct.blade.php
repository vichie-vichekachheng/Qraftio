@extends('admin.maindesign')

@section('add_products')

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-secondary">
            <h4 class="mb-0">Add New Product</h4>
        </div>
        @if (session("success"))
        <div class="alert alert-success">{{ session('success')}}</div>
        
        @endif
        <div class="card-body">
            <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Enter product name">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter quantity">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter product description"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
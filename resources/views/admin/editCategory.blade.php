
@extends('admin.maindesign')

@section('add_category')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-white mb-1">Edit Category</h2>
            <p class="text-secondary mb-0">Update your category information and image.</p>
        </div>

        <a href="{{ route('admin.viewCategory') }}" class="btn btn-outline-light">
            <i class="bi bi-arrow-left me-2"></i> Back
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4" style="background-color: #1c1c1c; color: white; max-width: 750px;">

        <div class="card-header border-secondary bg-transparent px-4 py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-pencil-square me-2"></i> Category Information
            </h5>
        </div>

        <div class="card-body p-4">

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.updateCategory', $category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Category Name -->
                <div class="mb-4">
                    <label for="category_name" class="form-label fw-semibold">
                        Category Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        id="category_name"
                        name="category_name"
                        class="form-control bg-dark text-white border-secondary py-2 @error('category_name') is-invalid @enderror"
                        placeholder="Enter category name"
                        value="{{ old('category_name', $category->category_name) }}"
                        required
                    >

                    @error('category_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control bg-dark text-white border-secondary"
                        rows="4"
                        placeholder="Write something about this category..."
                    >{{ old('description', $category->description) }}</textarea>

                    @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Category Image</label>

                    <div class="mb-3">
                        @if($category->image)
                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="Category Image"
                                class="rounded-3 border border-secondary"
                                style="width: 150px; height: 120px; object-fit: cover;"
                            >
                        @else
                            <p class="text-secondary">No image available.</p>
                        @endif
                    </div>

                    <label for="image" class="form-label fw-semibold">
                        Upload New Image
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control bg-dark text-white border-secondary"
                        accept="image/*"
                    >

                    <small class="text-secondary">
                        Leave empty to keep the current image.
                    </small>

                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="border-secondary my-4">

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.viewCategory') }}"
                       class="btn btn-outline-secondary px-4">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-2"></i>
                        Update Category
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection

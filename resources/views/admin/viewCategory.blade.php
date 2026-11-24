@extends('admin.maindesign')

@section('view_category')
    <div class="container py-4">

        <div class="card bg-dark text-light border-0 shadow-sm">

            <div
                class="card-header bg-dark border-bottom border-secondary d-flex justify-content-between align-items-center py-3 px-4">
                <div>
                    <h5 class="mb-1 fw-semibold text-light">Categories</h5>
                    <small class="text-muted">Manage all product categories</small>
                </div>

                <a href="{{ route('admin.addCategory') }}" class="btn btn-primary btn-sm px-3">
                    <i class="bi bi-plus-lg me-1"></i> Add Category
                </a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle text-center mb-0">

                        <thead>
                            <tr>
                                <th class="ps-4 py-3 text-muted small fw-semibold" style="width: 70px;">ID</th>
                                <th class="py-3 text-muted small fw-semibold">CATEGORY NAME</th>
                                <th class="py-3 text-muted small fw-semibold">DESCRIPTION</th>
                                <th class="py-3 text-muted small fw-semibold">IMAGE</th>
                                <th class="py-3 text-muted small fw-semibold">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="ps-4 text-muted small">
                                        #{{ $category->id }}
                                    </td>

                                    <td class="fw-semibold text-light">
                                        {{ $category->category_name }}
                                    </td>

                                    <td class="text-muted small" style="max-width: 300px;">
                                        {{ $category->description ?: 'No description available' }}
                                    </td>

                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->category_name }}"
                                                class="d-block mx-auto rounded border border-secondary"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary-subtle text-light fw-normal">
                                                No image
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-nowrap">
                                        <div class="d-inline-flex align-items-center gap-1">
                                            <a href="{{ route('admin.viewCat', $category->id) }}" class="btn btn-sm btn-outline-secondary" title="View">
                                                <i class="bi bi-eye me-1"></i>View
                                            </a>

                                            <a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bi bi-pencil me-1"></i>Edit
                                            </a>

                                            <form action="{{ route('admin.deleteCategory', $category) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="bi bi-folder2-open fs-2 text-muted"></i>
                                        <p class="text-muted small mb-0 mt-2">No categories found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="p-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
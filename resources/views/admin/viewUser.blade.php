@extends('admin.maindesign')

@section('view_users')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-white mb-1">Manage Users</h3>
                <p class="text-secondary mb-0">Manage and monitor all registered users.</p>
            </div>

            <a href="{{ route('admin.addUser') }}" class="btn btn-primary px-3 py-2">
                <i class="bi bi-person-plus-fill me-2"></i>Add New User
            </a>
        </div>

        <div class="card border-0 shadow-lg" style="background: rgba(0, 0, 0, 0.5);">

            <div class="card-header border-secondary px-4 pt-4" style="background: transparent;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold text-white mb-1">All Users</h5>
                        <p class="text-secondary small mb-0">A complete list of registered accounts.</p>
                    </div>

                    <div>
                        <form action="{{ route('admin.searchUser')}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="position-relative d-none d-sm-block" style="width: 380px;">
                                <button type="submit"
                                    class="btn position-absolute top-50 start-0 translate-middle-y ms-2 border-0 bg-transparent">
                                    <i class="bi bi-search text-muted small"></i>
                                </button>

                                <input type="text" class="form-control search-cmd ps-5 rounded-3" name="search"
                                    placeholder="Search users.....">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body px-4">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead>
                            <tr class="border-secondary">
                                <th class="py-3 text-secondary">ID</th>
                                <th class="py-3 text-secondary">User Information</th>
                                <th class="py-3 text-secondary">Email Address</th>
                                <th class="py-3 text-secondary">Role</th>
                                <th class="py-3 text-secondary">Joined Date</th>
                                <th class="py-3 text-secondary text-center">Actions</th>
                            </tr>
                        </thead>
                        @if (session('delete_success'))
                            <div class="alert alert-success">
                                {{ session('delete_success') }}
                            </div>

                        @endif

                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-secondary">

                                    <td class="fw-semibold text-secondary">#{{ $user->id }}</td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 text-info fw-bold"
                                                style="width: 40px; height: 40px; background: rgba(13, 110, 253, 0.2);">
                                                {{ strtoupper(substr($user->email, 0, 1)) }}
                                            </div>

                                            <div>
                                                <div class="fw-semibold text-white">{{ $user->name }}</div>
                                                <small class="text-secondary">Registered Account</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-light">{{ $user->email }}</td>

                                    <td>
                                        @if($user->user_type == 'admin')
                                            <span class="badge px-3 py-2"
                                                style="background: rgba(220, 53, 69, 0.2); color: #ff6b81;">
                                                <i class="bi bi-shield-fill-check me-1"></i> Admin
                                            </span>
                                        @else
                                            <span class="badge px-3 py-2"
                                                style="background: rgba(13, 110, 253, 0.2); color: #6ea8fe;">
                                                <i class="bi bi-person-fill me-1"></i> User
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-secondary">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-sm border" style="background: rgba(109, 119, 4, 0.15); color: #b7ae0c; border-color: rgba(71, 98, 19, 0.3) !important;">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.deleteUser', $user) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm border"
                                                    style="background: rgba(220, 53, 69, 0.15); color: #ff6b81; border-color: rgba(220, 53, 69, 0.3) !important;"
                                                    title="Delete User">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-people text-secondary fs-1"></i>
                                        <h6 class="fw-bold text-white mt-3">No Users Found</h6>
                                        <p class="text-secondary mb-0">There are currently no registered users.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

            <div>
                {{ $users->links() }}
            </div>

        </div>

    </div>

@endsection
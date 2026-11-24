<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qraftio | Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!DOCTYPE html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    <style>
        body {
            background: #0b1120;
            color: #e2e8f0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .brand {
            color: #fff;
            letter-spacing: -1px;
        }

        .edit-card {
            background: #111c30;
            border: 1px solid #26354d;
            border-radius: 14px;
        }

        .form-control {
            background: #0b1528;
            border: 1px solid #293951;
            color: #fff;
            padding: 9px 12px;
            border-radius: 7px;
            font-size: 14px;
        }

        .form-control:focus {
            background: #0b1528;
            color: #fff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-label {
            color: #cbd5e1;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 13px;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: rgba(37, 99, 235, .15);
            color: #60a5fa;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .divider {
            border-color: #293951;
            opacity: 1;
        }

        .btn-primary {
            background: #2563eb;
            border: none;
            padding: 9px;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-outline-secondary {
            border-color: #475569;
            color: #cbd5e1;
            font-size: 14px;
        }

        .btn-outline-secondary:hover {
            background: #26354d;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-3">

        <!-- Brand -->
        <div class="text-center mb-3">
            <a href="/" class="text-decoration-none d-inline-flex align-items-center gap-2">
                <i class="bi bi-bag-check-fill fs-3 text-white"></i>
                <h3 class="brand fw-bold mb-0">Qraftio</h3>
            </a>
            <p class="subtitle mt-1 mb-0">Administration / User Management</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">

                <div class="edit-card shadow-lg">
                    <div class="card-body p-3 p-md-4">

                        <!-- Header -->
                        <div class="text-center mb-3">
                            <div class="icon-box mb-2">
                                <i class="bi bi-person-gear fs-4"></i>
                            </div>

                            <h4 class="fw-bold text-white mb-1">Edit User</h4>
                            <p class="subtitle mb-0">Update user account information.</p>
                        </div>

                        <hr class="divider my-3">

                        @if (session('success'))
                            <div class="alert alert-success py-2 small">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-person me-1"></i> Full Name
                                </label>

                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter full name">

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-envelope me-1"></i> Email Address
                                </label>

                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Enter email address">

                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <hr class="divider my-3">

                            <h6 class="text-white fw-semibold mb-3 small">
                                <i class="bi bi-shield-lock me-2 text-primary"></i>
                                SECURITY SETTINGS
                            </h6>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Password</label>

                                <input type="password" name="password" class="form-control"
                                    placeholder="Leave blank to keep current password">

                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confirm New Password</label>

                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm new password">
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary flex-fill fw-semibold">
                                    <i class="bi bi-check2-circle me-1"></i> Save Changes
                                </button>

                                <a href="{{ route('admin.viewUser') }}"
                                    class="btn btn-outline-secondary px-3">
                                    Cancel
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

                <p class="text-center subtitle mt-3 small">
                    <i class="bi bi-shield-check me-1"></i>
                    Qraftio Admin Panel &copy; {{ date('Y') }}
                </p>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
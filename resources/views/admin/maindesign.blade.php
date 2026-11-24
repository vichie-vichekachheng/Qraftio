<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'AdminConsole') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    <style>
        :root {
            --bg-canvas: #090d16;
            --bg-surface: #0f172a;
            --bg-elevated: #1e293b;
            --border-subtle: rgba(148, 163, 184, 0.12);
            --accent-primary: #6366f1;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #e2e8f0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--sidebar-width);
            background-color: var(--bg-surface);
            border-right: 1px solid var(--border-subtle);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
        }

        .sidebar-section-title {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #64748b;
            padding: 1.25rem 1rem 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.9rem;
            margin: 0.15rem 0.75rem;
            border-radius: 0.5rem;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.04);
            color: #f8fafc;
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.18) 0%, rgba(99, 102, 241, 0.04) 100%);
            color: #818cf8;
            border-left: 3px solid var(--accent-primary);
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        /* Main Wrapper offset by Sidebar on Desktop */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                display: none;
            }
            .admin-main {
                margin-left: 0;
            }
        }

        /* Top Glass Navbar */
        .admin-topbar {
            background-color: rgba(9, 13, 22, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-subtle);
            height: 64px;
        }

        /* Search Input */
        .search-cmd {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            color: #cbd5e1;
            font-size: 0.85rem;
        }
        .search-cmd:focus {
            background-color: var(--bg-elevated);
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        /* Dark Slate Cards */
        .admin-card {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: 0.75rem;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
    </style>

    @stack('styles')
</head>
<body>
    <aside class="admin-sidebar d-none d-lg-flex flex-column justify-content-between">
        <div>
           <a href="{{ route('index') }}">
             <div class="d-flex align-items-center gap-2 px-4 border-bottom" style="height: 64px; border-color: var(--border-subtle) !important;">
               
                <span class="fw-bold tracking-tight text-white fs-3">QRAFTIO</span>
               
            </div>
        </a>
            <nav class="mt-2">
                <div class="sidebar-section-title">Core</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
               <div class="sidebar-section-title">Users Management</div>
                <a href="{{ route('admin.addUser') }}" class="sidebar-link"><i class="bi bi-person"></i>Add User</a>
                <a href="{{ route('admin.viewUser') }}" class="sidebar-link"><i class="bi bi-person"></i>View Users</a>
                <div class="sidebar-section-title">Categories Management</div>
                <a href="{{ route('admin.addCategory') }}" class="sidebar-link">
                    <i class="bi bi-box-seam"></i> Add Category
                </a>
                <a href="{{ route('admin.viewCategory') }}" class="sidebar-link">
                    <i class="bi bi-box-seam"></i> View Categories
                </a>
               

                <div class="sidebar-section-title">Products Management</div>
                <a href="{{ route('admin.addProduct') }}" class="sidebar-link"><i class="bi bi-box-seam"></i>Add Product</a>
                <a href="{{ route('admin.viewProduct') }}" class="sidebar-link"><i class="bi bi-box-seam"></i>View Products</a>
                <div class="sidebar-section-title">Orders Management</div>
                <div class="d-flex justify-content-between align-items-center">
                     <a href="{{ route('admin.addProduct') }}" class="sidebar-link"><i class="bi bi-box-seam"></i>View Orders</a>
                    <span class="badge bg-danger me-5">0</span>
                </div>
               
                
            </nav>
        </div>

        <!-- Bottom Server Status Card -->
        <div class="p-3 m-3 rounded-3" style="background-color: rgba(30, 41, 59, 0.5); border: 1px solid var(--border-subtle);">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="small fw-semibold text-light">System Status</span>
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25" style="font-size: 0.65rem;">
                    <i class="bi bi-circle-fill me-1" style="font-size: 0.45rem;"></i> Operational
                </span>
            </div>
            <div class="text-muted" style="font-size: 0.75rem;">API Latency: <span class="font-mono text-light">24ms</span></div>
        </div>
    </aside>
    <!-- Main Content Wrapper -->
    <div class="admin-main">
        
        <!-- Sticky Topbar -->
        <header class="admin-topbar sticky-top px-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <!-- Mobile Menu Trigger -->
                <button class="btn btn-dark border d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Right Utility Controls -->
            <div class="d-flex align-items-center gap-3">
                <!-- Quick Action -->
                <button class="btn btn-sm btn-outline-secondary rounded-3 d-none d-sm-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-lg"></i> Quick Create
                </button>

                <!-- Notifications -->
                <button class="btn btn-dark border position-relative rounded-3 px-2 py-1" type="button">
                    <i class="bi bi-bell text-secondary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-indigo border border-dark rounded-circle" style="background-color: #6366f1;"></span>
                </button>

                <!-- Admin Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown">
                        <img src="https://ih1.redbubble.net/image.5050264020.6857/tst,large,507x507-pad,600x600,f8f8f8.webp" alt="Admin" width="34" height="34" class="rounded-circle object-fit-cover border border-secondary">
                        <div class="d-none d-md-block text-start lh-1">
                            <div class="small fw-semibold">{{ Auth::user()->email }}</div>
                            <span class="text-muted" style="font-size: 0.7rem;">Super Admin</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-secondary border-opacity-25 mt-2" style="background-color: var(--bg-elevated);">
                        <li><h6 class="dropdown-header text-muted">{{ Auth::user()->name }}</h6></li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item py-2"><i class="bi bi-user"></i>Account Profile</a>
                        </li>
                        <li><a class="dropdown-item py-2" href="#"><i class="bi bi-key me-2"></i>Security & 2FA</a></li>
                        <li><hr class="dropdown-divider border-secondary border-opacity-25"></li>
                        <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-start ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-900 focus:bg-gray-100 focus:border-gray-400 transition duration-150 ease-in-out">
                            {{ __('Sign Out') }}
                        </button>
                    </form>
                    </li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="flex-grow-1 p-4">
            <div class="container-fluid px-0">
                @yield('dashboard')
                @yield('add_category')
                @yield('view_category')
                @yield('add_products')
                @yield('view_products')
                @yield('add_user')
                @yield('view_users')
                @yield('view_orders')
                
            </div>
        </main>

        <!-- Minimal Admin Footer -->
        <footer class="px-4 py-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center text-muted small" style="border-color: var(--border-subtle) !important;">
            <div>&copy; {{ date('Y') }} Admin Management,<span class="text-uppercase"> {{ Auth::user()->name  }} </span>!</div>
           
        </footer>

    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
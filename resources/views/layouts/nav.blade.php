<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 sticky-top">
    <div class="container">

        <a class="navbar-brand fw-bold fs-3 text-dark" href="{{ route('index') }}" style="letter-spacing: 2px;">
            QRAFTIO<span class="text-secondary">.</span>
        </a>

        <button class="navbar-toggler shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#qraftioNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="qraftioNavbar">

            <ul class="navbar-nav mx-auto gap-lg-4 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('index') }}#products">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="#">Collections</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="#">Contact</a>
                </li>

            </ul>

            <div class="d-flex align-items-center gap-4 mt-3 mt-lg-0">

                <a href="#" class="text-dark fs-5">
                    <i class="bi bi-search"></i>
                </a>

               @auth

                    @if(Auth::user()->user_type == 'admin')

                        <a href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Admin Dashboard
                        </a>

                    @elseif(Auth::user()->user_type == 'user')

    <div class="d-flex align-items-center gap-3">

        <a href=""
            class="btn btn-light border rounded-pill px-3 py-2 fw-semibold text-dark">
            <i class="bi bi-person-circle me-2"></i>
            {{ Auth::user()->name }}'s Dashboard
        </a>
    </div>

@endif

                @else

                    <a href="{{ route('login') }}">
                        <i class="bi bi-person"></i> Login
                    </a>/
                    <a href="{{ route('register') }}">Register</a>

                @endauth
                <a href="{{ route('viewCart') }}" class="text-dark fs-5 position-relative">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                        {{ $count }}
                    </span>
                </a>

            </div>

        </div>
    </div>
</nav>
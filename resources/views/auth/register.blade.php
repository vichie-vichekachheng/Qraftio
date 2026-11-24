<x-guest-layout>

    <div class="text-center mb-5">
        <a href="/" class="text-decoration-none d-inline-flex align-items-center gap-2">
            <i class="bi bi-bag-check-fill fs-1 text-primary"></i>
            <h1 class="fw-semibold text-white">QRAFTIO</h1>
            <br>
            <hr>
        </a>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Full Name')" class="text-light fw-semibold mb-2" />

            <div class="position-relative">
                <i class="bi bi-person position-absolute top-50 translate-middle-y text-secondary ms-3"></i>

                <x-text-input
                    id="name"
                    class="block mt-1 w-full ps-5 bg-dark text-white border-secondary rounded-3 py-3"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your full name"
                />
            </div>

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" class="text-light fw-semibold mb-2" />

            <div class="position-relative">
                <i class="bi bi-envelope position-absolute top-50 translate-middle-y text-secondary ms-3"></i>

                <x-text-input
                    id="email"
                    class="block mt-1 w-full ps-5 bg-dark text-white border-secondary rounded-3 py-3"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="example@email.com"
                />
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-light fw-semibold mb-2" />

            <div class="position-relative">
                <i class="bi bi-lock position-absolute top-50 translate-middle-y text-secondary ms-3"></i>

                <x-text-input
                    id="password"
                    class="block mt-1 w-full ps-5 bg-dark text-white border-secondary rounded-3 py-3"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a strong password"
                />
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-light fw-semibold mb-2" />

            <div class="position-relative">
                <i class="bi bi-shield-lock position-absolute top-50 translate-middle-y text-white ms-3"></i>

                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full ps-5 bg-dark text-white border-secondary rounded-3 py-3"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                />
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="mt-4">
            <x-primary-button class="w-100 justify-content-center py-3 rounded-3 fw-bold text-white">
                <i class="bi bi-person-plus-fill me-2"></i>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="text-center mt-5">
        <small class="text-white">
            <i class="bi bi-shield-check me-1"></i>
            Your information is protected and secure.
        </small>
    </div>

</x-guest-layout>
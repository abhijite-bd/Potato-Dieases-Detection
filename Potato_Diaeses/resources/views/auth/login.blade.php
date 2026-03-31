<x-guest-layout>

    <h5 class="fw-bold mb-1">Welcome back 👋</h5>
    <p class="text-muted small mb-4">Sign in to your account to continue</p>

    {{-- Session Status --}}
    @if (session('status'))
    <div class="alert alert-success d-flex align-items-center gap-2 py-2 small mb-3">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('status') }}</span>
    </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center gap-2 py-2 small mb-3">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span>{{ $errors->first() }}</span>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label fw-semibold small">Email Address</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control border-start-0 @error('email') is-invalid @enderror"
                    placeholder="you@example.com"
                    required autofocus>
            </div>
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label class="form-label fw-semibold small mb-0">Password</label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="small text-success text-decoration-none">
                    Forgot password?
                </a>
                @endif
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-lock text-muted"></i>
                </span>
                <input type="password"
                    name="password"
                    class="form-control border-start-0 @error('password') is-invalid @enderror"
                    placeholder="••••••••"
                    required>
            </div>
        </div>

        {{-- Remember Me --}}
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label small text-muted" for="remember">Remember me</label>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
            <i class="bi bi-box-arrow-in-right me-2"></i> Log In
        </button>

    </form>

    {{-- Divider --}}
    <div class="position-relative text-center my-4">
        <hr>
        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 small text-muted">or</span>
    </div>

    {{-- Register Link --}}
    @if (Route::has('register'))
    <p class="text-center small text-muted mb-0">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-success fw-semibold text-decoration-none">Register</a>
    </p>
    @endif

</x-guest-layout>
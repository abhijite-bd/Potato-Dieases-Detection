<nav class="navbar navbar-expand-md navbar-dark shadow-sm"
    style="background: linear-gradient(135deg, #198754, #0d6efd);">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            🌿 আলু রোগ শনাক্তকরণ
        </a>

        {{-- Hamburger --}}
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Links --}}
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>
            </ul>

            {{-- User Dropdown --}}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                        data-bs-toggle="dropdown">

                        @auth
                        <div class="bg-white text-success rounded-circle d-flex align-items-center
                    justify-content-center fw-bold"
                            style="width:30px;height:30px;font-size:.8rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        {{ Auth::user()->name }}
                        @else
                        <i class="bi bi-person-circle me-1"></i> Guest
                        @endauth

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                        @auth
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2 text-muted"></i> Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                        @else
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-2 text-muted"></i> Log In
                            </a>
                        </li>
                        @endauth

                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>
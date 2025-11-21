<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Noiré navigation bar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Noiré</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsNoiré"
            aria-controls="navbarsNoiré" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsNoiré">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/about') }}">About us</a>
                </li>
                <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact us</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link bg-transparent border-0 text-white">
                            Logout
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}">
                        <img src="{{ asset('assets/images/cart.svg') }}" alt="Cart">
                    </a>
                </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <img src="{{ asset('assets/images/user.svg') }}" alt="User">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}">
                        <img src="{{ asset('assets/images/cart.svg') }}" alt="Cart">
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

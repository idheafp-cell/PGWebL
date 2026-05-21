<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fa-regular fa-map"></i>{{ $title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('peta') }}">Peta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tabel') }}">Tabel</a>
                </li>
                @guest
                    <li class="nav-item bg-primary rounded">
                        <a class="nav-link text-white" href="{{ route('login') }}">
                            <i class="fa-solid fa-user"></i> Login
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item bg-danger rounded">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link text-white border-0 bg-transparent" type="submit">
                                <i class="fa-solid fa-user"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

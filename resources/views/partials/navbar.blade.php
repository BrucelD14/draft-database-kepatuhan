<nav class="navbar navbar-expand-lg navbar-light bg-body">
    <div class="container">
        <a class="navbar-brand" href="/landing">
            <img src="img/inka.png" alt="" width="200">

        </a>
        <a class="navbar-brand" href="https://jdih.bumn.go.id/" target="_blank">
            <img src="img/bumn.png" alt="" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav ms-auto" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('landing') ? 'active' : '' }}" aria-current="page"
                        href="/landing">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk_hukum*') ? 'active' : '' }}" aria-current="page"
                        href="/produk_hukum">Produk Hukum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('matriks') ? 'active' : '' }}" href="#">Matriks</a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endauth


        </div>
    </div>
</nav>

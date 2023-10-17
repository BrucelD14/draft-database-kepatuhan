<nav class="navbar navbar-expand-lg navbar-light bg-body">
    <div class="container">
        <a class="navbar-brand" href="/landing">
            <img src="/img/inka.png" alt="PT Industri Kereta Api (Persero)" width="200">

        </a>
        <a class="navbar-brand" href="https://jdih.bumn.go.id/" target="_blank">
            <img src="/img/bumn.png" alt="Kementerian BUMN" width="200">
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
                    <a class="nav-link {{ Request::is('produk_hukum*', 'peraturan_internal_perusahaan', 'peraturan_eksternal', 'peraturan_menteri_bumn', 'reviu_peraturan_internal') ? 'active' : '' }}"
                        aria-current="page" href="/produk_hukum">Produk Hukum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('matriks*') ? 'active' : '' }}" href="/matriks">Matriks</a>
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
                            @can('not_reader')
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                        My Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endcan
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

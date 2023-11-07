<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/landing">
            <img src="/img/inka.png" alt="PT Industri Kereta Api (Persero)" width="150">
        </a>
        <a class="navbar-brand" href="https://jdih.bumn.go.id/" target="_blank">
            <img src="/img/bumn.png" alt="Kementerian BUMN" width="150">
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('landing') ? 'nav-active' : '' }}" id="nav-beranda"
                        href="/landing">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk_hukum*', 'peraturan_internal_perusahaan', 'peraturan_eksternal', 'peraturan_menteri_bumn', 'reviu_peraturan_internal', 'reviu_peraturan_eksternal') ? 'nav-active' : '' }}"
                        href="/produk_hukum">Produk
                        Hukum</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('matriks*') ? 'nav-active' : '' }}" href="/matriks">Matriks</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                {{-- <p class="d-inline">{{ auth()->user()->name }}</p> --}}
                <ul class="navbar-nav ms-auto d-inline-block">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @cannot('reader')
                                <li><a class="dropdown-item" href="/dashboard"><i
                                            class="bi bi-layout-text-sidebar-reverse"></i>
                                        My Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endcannot
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Yakin mau Logout?')"><i
                                            class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

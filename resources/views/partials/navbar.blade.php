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
                    <a class="nav-link click-scroll" href="/landing">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/produk_hukum">Produk Hukum</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/matriks">Matriks</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Extra</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                My Dashboard</a></li>
                        <li>
                            {{-- <a class="dropdown-item" href="contact.html"><i class="bi bi-box-arrow-right"></i>
                              Logout</a> --}}
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"
                                    onclick="return confirm('Yakin mau Logout?')"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                <p class="d-inline">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>
</nav>

<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">JDIH INKA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} d-flex align-items-center gap-2 "
                        aria-current="page" href="/dashboard">
                        <i class="bi bi-layout-text-sidebar-reverse d-flex align-items-center"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/peraturan_internal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/peraturan_internal">
                        <i class="bi bi-file-earmark-text d-flex align-items-center"></i>
                        Peraturan Internal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/peraturan_eksternal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/peraturan_eksternal">
                        <i class="bi bi-file-earmark-x d-flex align-items-center"></i>
                        Peraturan Eksternal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/peraturan_menteri_bumn*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/peraturan_menteri_bumn">
                        <i class="bi bi-file-earmark-minus d-flex align-items-center"></i>
                        Peraturan Menteri BUMN
                    </a>
                </li>

                <hr class="my-3">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/reviu_peraturan_internal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/reviu_peraturan_internal">
                        <i class="bi bi-file-earmark-text-fill d-flex align-items-center"></i>
                        Reviu Peraturan Internal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/reviu_peraturan_eksternal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/reviu_peraturan_eksternal">
                        <i class="bi bi-file-earmark-x-fill d-flex align-items-center"></i>
                        Reviu Peraturan Eksternal
                    </a>
                </li>

                <hr class="my-3">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/jenis_peraturan_internal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/jenis_peraturan_internal">
                        <i class="bi bi-collection-fill"></i>
                        Jenis Peraturan Internal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/reviu_peraturan_eksternal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/reviu_peraturan_eksternal">
                        <i class="bi bi-bank"></i>
                        Jenis Peraturan Eksternal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/reviu_peraturan_eksternal*') ? 'active' : '' }} d-flex align-items-center gap-2"
                        href="/dashboard/reviu_peraturan_eksternal">
                        <i class="bi bi-building-fill"></i>
                        Kategori Divisi
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto pb-3">
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2"><i
                                class="bi bi-box-arrow-right"></i>
                            Logout</button>
                    </form>
                </li>
            </ul>
            {{-- <hr class="my-3"> --}}
        </div>
    </div>
</div>

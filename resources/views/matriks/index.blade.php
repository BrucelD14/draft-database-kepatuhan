@extends('layouts.main')
@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>

                            <li class="breadcrumb-item active">Matriks</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-5">Matriks Peraturan Internal PT INKA (Persero)</h5>

                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                        fill="currentColor" class="bi bi-file-bar-graph d-block m-auto" viewBox="0 0 16 16">
                                        <path
                                            d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z" />
                                        <path
                                            d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                                    </svg>
                                    <h6 class="text-center mt-2 mb-1">{{ $internalRegCount }}</h6>
                                    <p class="text-center">Total Peraturan Internal Tahun {{ $year }}</p>
                                </div>


                                <a href="/matriks/peraturan_internal" class="btn custom-btn mt-2 mt-lg-3">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset('img/businesswoman-using-tablet-analysis.jpg') }}"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-5">Matriks Peraturan Eksternal PT INKA (Persero)</h5>

                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            fill="currentColor" class="bi bi-file-bar-graph-fill d-block m-auto"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 11.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5m-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5z" />
                                        </svg>
                                        <h6 class="text-center mt-2 mb-1">{{ $externalRevCount }}</h6>
                                        <p class="text-center text-white">Total Reviu Peraturan Eksternal Tahun
                                            {{ $year }}</p>
                                    </div>

                                    <a href="/matriks/peraturan_eksternal" class="btn custom-btn mt-2 mt-lg-3">Learn
                                        More</a>
                                </div>

                            </div>

                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

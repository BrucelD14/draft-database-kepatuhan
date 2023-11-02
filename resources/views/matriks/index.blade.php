@extends('layouts.main')
@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Matriks</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Matriks</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="topics-detail.html">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Matriks Peraturan Internal PT INKA (Persero)</h5>

                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                </div>

                                <span class="badge bg-finance rounded-pill ms-auto">30</span>
                            </div>

                            <img src="img/topics/undraw_Finance_re_gnv2.png" class="custom-block-image img-fluid"
                                alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset('img/businesswoman-using-tablet-analysis.jpg') }}"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2">Matriks Peraturan Eksternal PT INKA (Persero)</h5>

                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint
                                        animi necessitatibus aperiam repudiandae nam omnis</p>

                                    <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                </div>

                                <span class="badge bg-finance rounded-pill ms-auto">25</span>
                            </div>

                            <div class="social-share d-flex">
                                <p class="text-white me-4">Share:</p>

                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                    </li>
                                </ul>

                                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                            </div>

                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

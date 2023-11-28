@extends('layouts.main')
@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Produk Hukum</li>
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
                <div class="col-lg-6 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <a href="/peraturan_internal_perusahaan">
                            <div class="d-flex">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2">Peraturan Internal Perusahaan</h5>

                                        <hr>

                                        @foreach ($internalReg as $item)
                                            <h6 class="fs-6">{{ $item->nomor_peraturan }} <span
                                                    class="badge bg-success">new</span></h6>
                                            <p class="mb-0">{{ $item->tentang }}</p>
                                        @endforeach
                                    </div>

                                    {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <a href="/peraturan_eksternal">
                            <div class="d-flex">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2">Peraturan Eksternal Berkaitan Bisnis Proses</h5>

                                        <hr>

                                        @foreach ($externalReg as $item)
                                            <h6 class="fs-6">{{ $item->nomor_peraturan }} <span
                                                    class="badge bg-success">new</span></h6>
                                            <p class="mb-0">{{ $item->tentang }}</p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <a href="/peraturan_menteri_bumn">
                            <div class="d-flex">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2">Peraturan Menteri BUMN</h5>

                                        <hr>

                                        @foreach ($ministerialReg as $item)
                                            <h6 class="fs-6">{{ $item->nomor_peraturan }} <span
                                                    class="badge bg-success">new</span></h6>
                                            <p class="mb-0">{{ $item->tentang }}</p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <a href="/reviu_peraturan_internal">
                            <div class="d-flex">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2">Reviu Peraturan Internal</h5>

                                        <hr>

                                        @foreach ($internalRev as $item)
                                            <h6 class="fs-6">{{ $item->kpde }} <span class="badge bg-success">new</span>
                                            </h6>
                                            <p class="mb-0">{{ $item->tentang_peraturan }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <a href="/reviu_peraturan_eksternal">
                            <div class="d-flex">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2">Reviu Peraturan Eksternal</h5>

                                        <hr>

                                        @foreach ($externalRev as $item)
                                            <h6 class="fs-6">{{ $item->nomor_peraturan }} <span
                                                    class="badge bg-success">new</span>
                                            </h6>
                                            <p class="mb-0">{{ $item->tentang }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

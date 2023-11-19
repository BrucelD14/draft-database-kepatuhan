@extends('layouts.main')

@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="/produk_hukum">Produk Hukum</a></li>
                            <li class="breadcrumb-item"><a href="/{{ $link }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Detail {{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding" style=background-color:#DDF2FD;">
        <div class="container">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="text-center">
                        <p class="mb-0">{{ $regulation->kpde }}</p>
                        <h6 class="mb-2"> {!! $regulation->tentang_peraturan !!}</h6>
                        <hr class="mb-0">
                    </div>
                    <div class="d-flex">
                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Judul</td>
                                            <td class="d-inline-block">: {!! $regulation->tentang_peraturan !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Ketentuan Peraturan Perundang-undangan</td>
                                            <td>: {{ $regulation->kppp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ketentuan Peraturan Direksi Eksisting</td>
                                            <td>: {{ $regulation->kpde }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan Status</td>
                                            <td>: {!! $regulation->keterangan_status !!}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="{{ asset('storage/' . $regulation->dokumen) }}" target="_blank"
                                    class="btn btn-primary">Download
                                    Dokumen
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="search-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <form method="get" class="custom-form pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="search" type="search" class="form-control" id="keyword"
                                placeholder="Kata Kunci Peraturan ..." aria-label="Search">
                            <button type="submit" class="form-control">Cari</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <section class="" style="padding-bottom: 100px;background-color:#DDF2FD;">
        <div class="container">
            @if ($reg_list->count())
                <table class="table border-dark">
                    <thead>
                        <tr class="table-primary text-center align-middle">
                            <th scope="col">Ketentuan Peraturan Perundang-undangan</th>
                            <th scope="col">Ketentuan Peraturan Direksi Eksisting</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Dokumen</th>
                        </tr>
                    </thead>
                    @foreach ($reg_list as $reg)
                        <tbody>
                            <tr class="align-middle">
                                <td class="text-center">{{ $reg->kppp }}</td>
                                <td class="text-center">{{ $reg->kpde }}</td>
                                <td style="text-align:justify">{!! $reg->tentang_peraturan !!}</td>
                                <td style="text-align:justify">{!! $reg->keterangan_status !!}</td>
                                <td class="text-center"><a href="{{ asset('storage/' . $reg->dokumen) }}" target="_blank"
                                        class="btn btn-danger"><i class="bi bi-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <p class="text-center fs-4">No review found <i class="bi bi-emoji-frown"></i></p>
                <div class="row justify-content-center pt-2">
                    <div class="col-lg-4 text-center">
                        <a href="/produk_hukum" class="btn btn-secondary me-3"><i class="bi bi-arrow-90deg-left"></i>
                            Kembali</a>
                        <a href="/reviu_peraturan_internal" class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i>
                            Refresh</a>
                    </div>
                </div>
            @endif

            {{ $reg_list->links() }}
        </div>
    </section>

@endsection

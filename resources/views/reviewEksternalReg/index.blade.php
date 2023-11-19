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
                            <li class="breadcrumb-item active"><a href="/{{ $link }}">{{ $title }}</a></li>
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
                <form method="get" class="custom-form pt-2 mb-lg-0 mb-5 d-flex justify-content-center"  role="search">
                    <div class="col-lg-3 col-12 mx-1 text-end justify-content-end">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <select class="form-select border-0 form-control-lg my-1" name="selectedCategory" aria-label="Default select example">
                                <option value="" selected>Kategori Reviu</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $selectOptionValue == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mx-1 text-start justify-content-start">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="search" type="search" class="form-control form-control-lg" id="keyword" value="{{ $searchKeyword }}"
                                placeholder="Kata Kunci Peraturan ..." aria-label="Search" name="searchTerm" >
                            <button type="submit" class="form-control">Cari</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>


    <section class="" style="padding-bottom: 100px;background-color:#DDF2FD;">
        <div class="container">
            @if ($reg_list->count())
                <table class="table border-dark">
                    <thead>
                        <tr class="table-primary text-center align-middle">
                            <th scope="col">Tanggal Penetapan</th>
                            <th scope="col">Nomor Peraturan</th>
                            <th scope="col">Tentang</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($reg_list as $reg)
                        <tbody>
                            <tr class="align-middle">
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($reg->tanggal_penetapan)->translatedFormat('d F Y') }}</td>
                                <td class="text-center">{{ $reg->nomor_peraturan }}</td>
                                <td style="text-align:justify">{!! $reg->tentang !!}</td>
                                <td class="text-center">
                                    @if ($reg->status == 'active')
                                        <span class="badge bg-success">{{ 'Berlaku' }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/{{ $link }}/{{ $reg->id }}" target="_blank"
                                        class="btn btn-outline-primary m-1"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ asset('storage/' . $reg->dokumen) }}" target="_blank"
                                        class="btn btn-warning m-1"><i class="bi bi-download"></i></a>
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
                        <a href="/reviu_peraturan_eksternal" class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i>
                            Refresh</a>
                    </div>
                </div>
            @endif

            {{ $reg_list->onEachSide(1)->links() }}
        </div>
    </section>

@endsection

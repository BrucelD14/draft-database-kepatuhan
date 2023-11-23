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
                        <p class="mb-0">{{ $regulation->nomor_peraturan }}</p>
                        <h6 class="mb-2"> {!! $regulation->tentang !!}</h6>
                        <hr class="mb-0">
                    </div>
                    <div class="d-flex">
                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Judul</td>
                                            <td class="d-inline-block">: {!! $regulation->tentang !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Peraturan</td>
                                            <td>: {{ $regulation->nomor_peraturan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Peraturan</td>
                                            <td>: {{ $regulation->jenisPeraturanInternal->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Penetapan</td>
                                            <td>:
                                                {{ \Carbon\Carbon::parse($regulation->tanggal_penetapan)->translatedFormat('d F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Penetapan</td>
                                            <td>:
                                                @if ($regulation->status == 'active')
                                                    <span class="badge bg-success">{{ 'Berlaku' }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Keterangan</td>
                                            <td>: {!! $regulation->keterangan_status !!}</td>
                                        </tr>
                                        @if (isset($regulation->kategoriDivisi->nama))
                                            <tr>
                                                <td>Divisi/Unit Terkait</td>
                                                <td>:
                                                    <button class="btn btn-outline-danger"
                                                        style="cursor:default">{{ $regulation->kategoriDivisi->nama }}</button>
                                                </td>
                                            </tr>
                                        @endif
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

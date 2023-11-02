@extends('layouts.main')

@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="/produk_hukum">Produk Hukum</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peraturan Internal</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="/{{ $active }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ketik kata kunci" name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-danger" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if ($reg_list->count())
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-danger text-center align-middle">
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Tanggal Penetapan</th>
                        <th scope="col">Jenis Peraturan</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Dokumen</th>
                    </tr>
                </thead>

                @foreach ($reg_list as $reg)
                    <tbody>
                        <tr class="align-middle">
                            <td class="text-center">{{ $reg->nomor_peraturan }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($reg->tanggal_penetapan)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">{{ $reg->jenisPeraturanInternal->nama }}</td>
                            <td style="text-align:justify">{!! $reg->tentang !!}</td>
                            <td class="text-center">
                                @if ($reg->status == 'active')
                                    <span class="badge bg-success">{{ 'Berlaku' }}</span>
                                @else
                                    <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                                @endif
                            </td>
                            <td style="text-align:justify">{!! $reg->keterangan_status !!}</td>
                            <td class="text-center"><a href="{{ asset('storage/' . $reg->dokumen) }}" target="_blank"
                                    class="btn btn-danger"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                    </tbody>
                @endforeach
            @else
                <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
            </table>
        </div>
    @endif


    {{ $reg_list->links() }}
@endsection

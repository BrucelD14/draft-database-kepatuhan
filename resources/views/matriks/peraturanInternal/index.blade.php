@extends('matriks.peraturanInternal.layouts.main')

@section('container')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/landing">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="/matriks">Matriks</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>

    {{-- CHART --}}
    <section class="section-bg" style="padding-top:50px;">
        <div class="container">
            <div class="row py-2">
                <div class="col-md-3 mb-2 ms-1">
                    <form method="GET" id="search-form">
                        <label for="tanggal_penetapan" class="form-label">Pilih Tahun</label>
                        <div class="d-flex align-items-center">
                            <select class="form-select" name="tahun" id="tanggal_penetapan">
                                @foreach ($periode as $item)
                                    <option value="{{ $item }}" @if ($tahun == $item) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                            <a href="/matriks/peraturan_internal" class="btn btn-outline-primary ms-2">Reset</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </section>
    {{-- CHART --}}

    <section class="section-bg" style="padding-top:20px;padding-bottom:60px;">
        <div class="container">
            <div class="row py-3">
                <table class="table border-dark">
                    <thead>
                        <tr class="table-success text-center">
                            <th scope="col">#</th>
                            <th scope="col">Jenis Peraturan</th>
                            @foreach ($periode as $p)
                                <th scope="col">{{ $p }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>Peraturan Direksi</td>
                            @foreach ($peraturanDireksi as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <td>Surat Edaran</td>
                            @foreach ($suratEdaran as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

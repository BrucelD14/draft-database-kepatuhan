@extends('matriks.peraturanEksternal.layouts.main')

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
                            <a href="/matriks/peraturan_eksternal" class="btn btn-outline-primary ms-2">Reset</a>
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
                            <td>Undang-Undang</td>
                            @foreach ($undangUndang as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <td>Peraturan Pemerintah</td>
                            @foreach ($peraturanPemerintah as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">3</th>
                            <td>Peraturan Pemerintah Pengganti Undang-Undang</td>
                            @foreach ($perPu as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">4</th>
                            <td>Peraturan Presiden</td>
                            @foreach ($perPres as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">5</th>
                            <td>Instruksi Presiden</td>
                            @foreach ($inPres as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">6</th>
                            <td>Keputusan Presiden</td>
                            @foreach ($kepPres as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">7</th>
                            <td>Surat Edaran Sekretaris Kementerian</td>
                            @foreach ($sesMen as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">8</th>
                            <td>Peraturan Mahkamah Agung</td>
                            @foreach ($perMa as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">9</th>
                            <td>Putusan Mahkamah Konstitusi</td>
                            @foreach ($putusanMK as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">10</th>
                            <td>Peraturan Menteri</td>
                            @foreach ($perMen as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th scope="row">11</th>
                            <td>Keputusan Menteri</td>
                            @foreach ($kepMen as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('matriks.peraturanInternal.layouts.main')

@section('container')
    <div class="row mb-3">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-md-2 mb-2 ms-1">
            <form method="GET" id="search-form">
                <label for="tanggal_penetapan" class="form-label">Pilih Tahun</label>
                <select class="form-select" name="tahun" id="tanggal_penetapan">
                    @foreach ($periode as $item)
                    <option value="{{ $item }}" @if ($tahun == $item) selected @endif>{{ $item }}</option>
                    @endforeach
                    
                </select>
            </form>
        </div>
        <div class="col-lg-12">
            {!! $chart->container() !!}
        </div>
    </div>
    <div class="row py-3">
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary text-center">
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
@endsection

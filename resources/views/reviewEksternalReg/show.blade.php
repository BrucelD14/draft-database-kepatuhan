@extends('layouts.main')

@section('container')
    <div class="row mb-4">
        <div class="col-md-10">
            <h2>Detail {{ $title }}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <p class="mb-1">{{ $regulation->nomor_peraturan }}</p>
            <p class="fs-5 fw-bolder">{!! $regulation->tentang !!}</p>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                <div class="col-md-4">
                    <p>Judul</p>
                    <p>Nomor Peraturan</p>
                    <p>Jenis Peraturan</p>
                    <p>Tanggal Penetapan</p>
                    <p>Status Peraturan</p>
                    <p>Ringkasan Umum</p>
                    <p>Divisi/Unit Terkait</p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="col-md-7">
                    <p>{!! $regulation->tentang !!}</p>
                    <p>{{ $regulation->nomor_peraturan }}</p>
                    <p>{{ $regulation->jenisPeraturanEksternal->nama }}</p>
                    <p>{{ \Carbon\Carbon::parse($regulation->tanggal_penetapan)->translatedFormat('d F Y') }}</p>
                    <p>
                        @if ($regulation->status == 'active')
                            <span class="badge bg-success">{{ 'Berlaku' }}</span>
                        @else
                            <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                        @endif
                    </p>
                    <p>{!! $regulation->ringkasan !!}</p>
                    <p>
                        @foreach ($divisi as $item)
                            <button class="btn btn-outline-danger"
                                style="cursor:default">{{ $item->kategoriDivisi->nama }}</button>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

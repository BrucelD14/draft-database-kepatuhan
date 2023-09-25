@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <a href="/dashboard/{{ $link }}" class="btn btn-outline-secondary btn-sm"><i
            class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <a href="/dashboard/{{ $link }}/{{ $regulation->id }}/edit" class="btn btn-warning btn-sm"><i
            class="bi bi-pencil-fill"></i> Edit</a>
    <form action="/dashboard/{{ $link }}/{{ $regulation->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')"><i
                class="bi bi-trash3-fill"></i>
            Hapus</button>
    </form>
    <div class="card mt-4">
        <h5 class="card-header">{{ $regulation->nomor_peraturan }}</h5>
        <div class="card-body">
            {{-- <h5 class="card-title">Detail Peraturan Internal Perusahaan</h5> --}}
            <p class="card-text">Jenis Peraturan : {{ $regulation->jenisPeraturanInternal->nama }}</p>
            <p class="card-text">Tentang : {!! $regulation->tentang !!}</p>
            <p class="card-text">Nomor Peraturan : {{ $regulation->nomor_peraturan }}</p>
            <p class="card-text">Tanggal Penetapan : {{ $regulation->tanggal_penetapan }}</p>
            <p class="card-text">
                @if ($regulation->status == 'active')
                    Status Peraturan : <span class="badge bg-success">{{ 'Berlaku' }}</span>
                @else
                    Status Peraturan : <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                @endif
            </p>
            <p class="card-text">Detail Status : {!! $regulation->keterangan_status !!}</p>
            {{-- <form action="{{ asset('storage/' . $regulation->dokumen) }}">
                @csrf
                <button class="btn btn-primary" type="submit">Download Dokumen</button>
            </form> --}}
            <a href="{{ asset('storage/' . $regulation->dokumen) }}" target="_blank" class="btn btn-primary">Download
                Dokumen</a>

        </div>
    </div>
@endsection

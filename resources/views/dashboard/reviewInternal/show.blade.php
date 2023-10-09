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
        <h5 class="card-header">Reviu Peraturan Internal</h5>
        <div class="card-body">
            {{-- <h5 class="card-title">Detail Peraturan Internal Perusahaan</h5> --}}
            <p class="card-text">Ketentuan Peraturan Perundang-undangan : {{ $regulation->kppp }}</p>
            <p class="card-text">Ketentuan Peraturan Direksi Eksisting : {{ $regulation->kpde }}</p>
            <p class="card-text">Tentang : {!! $regulation->tentang_peraturan !!}</p>
            <p class="card-text">Status : {!! $regulation->keterangan_status !!}</p>
            <p class="card-text">Tanggal Direviu :
                {{ \Carbon\Carbon::parse($regulation->created_at)->translatedFormat('d F Y') }}</p>
            <p class="card-text">Editor :
                @if ($regulation->user_id == null)
                    <strong>Tidak ada editor</strong>
                @else
                    {{ $regulation->user->name }}
                @endif
            </p>
            <a href="{{ asset('storage/' . $regulation->dokumen) }}" target="_blank" class="btn btn-primary">Download
                Dokumen</a>

        </div>
    </div>
@endsection

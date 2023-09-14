@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Peraturan Internal Perusahaan</h1>
    </div>
    <div class="card mt-4">
        <h5 class="card-header">{{ $internalReg->nomor_peraturan }}</h5>
        <div class="card-body">
            {{-- <h5 class="card-title">Detail Peraturan Internal Perusahaan</h5> --}}
            <p class="card-text">Jenis Peraturan : {{ $internalReg->jenis_peraturan }}</p>
            <p class="card-text">Tentang : {!! $internalReg->tentang !!}</p>
            <p class="card-text">Nomor Peraturan : {{ $internalReg->nomor_peraturan }}</p>
            <p class="card-text">Tanggal Penetapan : {{ $internalReg->tanggal_penetapan }}</p>
            <p class="card-text">
                @if ($internalReg->status == 'active')
                    Status Peraturan : <span class="badge bg-info">{{ 'Berlaku' }}</span>
                @else
                    Status Peraturan : <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                @endif
            </p>
            <p class="card-text">Detail Status : {!! $internalReg->keterangan_status !!}</p>
            {{-- <form action="{{ asset('storage/' . $internalReg->dokumen) }}">
                @csrf
                <button class="btn btn-primary" type="submit">Download Dokumen</button>
            </form> --}}
            <a href="{{ asset('storage/' . $internalReg->dokumen) }}" target="_blank" class="btn btn-primary">Download
                Dokumen</a>
        </div>
    </div>
@endsection

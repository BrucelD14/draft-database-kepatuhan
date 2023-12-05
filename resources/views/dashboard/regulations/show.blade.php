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
        <div class="card-header text-center p-3 bg-dark text-white">
            <h6 class="">{{ $regulation->nomor_peraturan }}</h6>
            <h5 class="">{!! $regulation->tentang !!}</h5>
        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Detail Peraturan Internal Perusahaan</h5> --}}
            <p class="card-text">Jenis Peraturan : {{ $regulation->jenisPeraturanInternal->nama }}</p>
            <p class="card-text">Tentang :
                {!! $regulation->tentang !!}
            </p>
            <p class="card-text">Nomor Peraturan : {{ $regulation->nomor_peraturan }}</p>
            <p class="card-text">Tanggal Penetapan :
                {{ \Carbon\Carbon::parse($regulation->tanggal_penetapan)->translatedFormat('d F Y') }}</p>
            <p class="card-text">
                @if ($regulation->status == 'active')
                    Status Peraturan : <span class="badge bg-success">{{ 'Berlaku' }}</span>
                @else
                    Status Peraturan : <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                @endif
            </p>
            {{-- <p class="card-text">
                @if ($regulation->visibility == 'public')
                    Visibilitas : <span class="badge bg-primary">{{ 'Public' }}</span>
                @else
                    Visibilitas : <span class="badge bg-warning">{{ 'Confidential' }}</span>
                @endif
            </p> --}}
            <p class="card-text">Detail Status : {!! $regulation->keterangan_status !!}</p>
            @if (isset($regulation->kategoriDivisi->div_name))
                <p class="card-text">
                    Divisi/Unit Pengusul : <button class="btn btn-outline-danger"
                        style="cursor:default">{{ $regulation->kategoriDivisi->div_name }}</button>
                    {{-- @else
                    Divisi/Unit Pengusul : <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span> --}}
                </p>
            @endif
            {{-- <p class="card-text">DIvisi/Unit Pengusul : {{ $regulation->kategoriDivisi->nama }}</p> --}}
            <a href="{{ asset('storage/' . $regulation->dokumen) }}" target="_blank" class="btn btn-primary">Download
                Dokumen</a>

        </div>
    </div>
@endsection

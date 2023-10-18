@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/{{ $link }}" class="btn btn-outline-secondary btn-sm"><i
            class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
            class="bi bi-sticky-fill"></i> Add Note</a>

    {{-- MODAL ADD NOTE --}}
    @include('dashboard.DraftReviewExternal.layouts.modalAddNote')
    {{-- END MODAL ADD NOTE --}}

    <div class="card my-4">
        <h5 class="card-header">{{ $regulation->nomor_peraturan }}</h5>
        <div class="card-body">
            <p class="card-text">Tanggal Penetapan :
                {{ \Carbon\Carbon::parse($regulation->tanggal_penetapan)->translatedFormat('d F Y') }}</p>
            <p class="card-text">Jenis Peraturan : {{ $regulation->jenisPeraturanEksternal->nama }}</p>
            <p class="card-text">
                @if ($regulation->status == 'active')
                    Status Peraturan : <span class="badge bg-success">{{ 'Berlaku' }}</span>
                @else
                    Status Peraturan : <span class="badge bg-warning">{{ 'Tidak Berlaku' }}</span>
                @endif
            </p>
            <p class="card-text">Tentang : {!! $regulation->tentang !!}</p>
            <p class="card-text">Ringkasan : {!! $regulation->ringkasan !!}</p>
            <p class="card-text">Divisi/Unit Terkait :
                @foreach ($divisi as $item)
                    <button class="btn btn-outline-danger" style="cursor:default">{{ $item->kategoriDivisi->nama }}</button>
                @endforeach
            </p>
            <p class="card-text">Edisi :
                {{ \Carbon\Carbon::parse($regulation->edisi)->translatedFormat('F Y') }}</p>
            <p class="card-text">Editor :
                @if ($regulation->user_id == null)
                    <strong>Tidak ada editor</strong>
                @else
                    {{ $regulation->user->name }}
                @endif
            </p>
            <p class="card=text"> Status Publish :
                @if ($regulation->status_publish == '1')
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </p>
            <p class="card-text">Dibuat pada :
                {{ \Carbon\Carbon::parse($regulation->created_at)->translatedFormat('d F Y') }}</p>
            <a href="{{ asset('storage/' . $regulation->dokumen) }}" target="_blank" class="btn btn-primary">Download
                Dokumen</a>
            <a href="/dashboard/{{ $link }}/approve/{{ $regulation->id }}" class="btn btn-outline-success ms-2"
                onclick="return confirm('Apakah anda yakin??')">Approve
                Reviu</a>
        </div>
    </div>
@endsection

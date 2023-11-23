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
    <a href="/dashboard/{{ $link }}/{{ $regulation->id }}/edit" class="btn btn-warning btn-sm"><i
            class="bi bi-pencil-fill"></i> Edit</a>
    <form action="/dashboard/{{ $link }}/{{ $regulation->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')"><i
                class="bi bi-trash3-fill"></i>
            Hapus</button>
    </form>
    <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
            class="bi bi-sticky-fill"></i> Add Note</a>

    {{-- MODAL ADD NOTE --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="staticBackdropLabel">Tambah Catatan Reviu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/dashboard/tambah_catatan_editor/{{ $regulation->id }}">
                    @csrf
                    <div class="modal-body text-start">
                        <label for="pesan_catatan" class="form-label">Pesan Catatan</label>
                        <input type="text" class="form-control" id="pesan_catatan" name="pesan_catatan" required
                            placeholder="Masukkan pesan catatan">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL ADD NOTE --}}

    <div class="card my-4">
        <div class="card-header text-center p-3 bg-dark text-white">
            <h6 class="">{{ $regulation->nomor_peraturan }}</h6>
            <h5 class="">{!! $regulation->tentang !!}</h5>
        </div>
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
                    <button class="btn btn-outline-danger"
                        style="cursor:default">{{ $item->kategoriDivisi->nama }}</button>
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
        </div>
    </div>
@endsection

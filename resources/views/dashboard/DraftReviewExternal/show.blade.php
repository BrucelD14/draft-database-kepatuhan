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
            class="bi bi-arrow-left-circle-fill"></i> Kembali</a>&nbsp;
    <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
            class="bi bi-sticky-fill"></i> Add Note</a>&nbsp;
    <button type="button" class="btn btn-success position-relative" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop{{ $regulation->id }}"><i class="bi bi-stickies-fill"></i>
        Note
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-dark">
            {{ $regulation->CatatanReviu->count() }}
        </span>
    </button>

    {{-- MODAL ADD NOTE --}}
    @include('dashboard.DraftReviewExternal.layouts.modalAddNote')
    {{-- END MODAL ADD NOTE --}}

    {{-- MODAL PESAN --}}
    {{-- @include('dashboard.DraftReviewExternal.layouts.modal') --}}
    <div class="modal fade" id="staticBackdrop{{ $regulation->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="staticBackdropLabel">Catatan Reviu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach ($regulation->CatatanReviu as $item)
                    <div class="modal-body text-start">
                        <p class="mb-1 fw-bolder">{{ $item->user->name }}</p>
                        <p class="mb-0">{{ $item->pesan_catatan }}</p>
                        <p class="mb-0 opacity-75" style="font-size:12px;">
                            {{ $item->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- END MODAL PESAN --}}

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
                        style="cursor:default">{{ $item->kategoriDivisi->div_name }}</button>
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

@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Draft | {{ $title }}</h1>
    </div>

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3">Tambah Reviu</a>
    @if ($regulations->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center align-middle">
                        <th scope="col">No</th>
                        <th scope="col">Dibuat pada</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Status Publish</th>
                        <th scope="col">Note</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($regulations as $regulation)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($regulation->created_at)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">{{ $regulation->nomor_peraturan }}</td>
                            <td style="text-align:justify">{!! $regulation->tentang !!}</td>
                            <td class="text-center">
                                @if ($regulation->status_publish == '1')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success position-relative" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $regulation->id }}">
                                    Inbox
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-dark">
                                        {{ $regulation->CatatanReviu->count() }}
                                    </span>
                                </button>
                                {{-- MODAL PESAN --}}
                                {{-- @include('dashboard.DraftReviewExternal.layouts.modal') --}}
                                <div class="modal fade" id="staticBackdrop{{ $regulation->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-4" id="staticBackdropLabel">Catatan Reviu</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            @if ($regulation->CatatanReviu->count())
                                                @foreach ($regulation->CatatanReviu as $item)
                                                    <div class="modal-body text-start">
                                                        <p class="mb-1 fw-bolder">{{ $item->user->name }}</p>
                                                        <p class="mb-0">{{ $item->pesan_catatan }}</p>
                                                        <p class="mb-0 opacity-75" style="font-size:12px;">
                                                            {{ $item->created_at->diffForHumans() }}</p>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="mt-1 fw-semibold">Tidak ada catatan reviu!</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                {{-- END MODAL PESAN --}}
                            </td>
                            <td class="text-center">
                                <a href="/dashboard/{{ $link }}/{{ $regulation->id }}"
                                    class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i> Detail</a>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
            @else
                <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
    @endif
    </table>
    </div>
@endsection

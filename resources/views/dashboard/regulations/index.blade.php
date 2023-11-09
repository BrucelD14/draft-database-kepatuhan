@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- PESAN SUKSES --}}

    {{-- PESAN ERROR --}}
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    {{-- PESAN ERROR --}}

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3 me-2">Tambah Peraturan</a>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#importModal">Import
        Peraturan</button>
    @if ($regulations->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Visibilitas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($regulations as $regulation)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $regulation->nomor_peraturan }}</td>
                            <td style="text-align:justify">{!! $regulation->tentang !!}</td>

                            <td class="text-center">
                                @if ($regulation->visibility == 'public')
                                    <span class="badge bg-primary">{{ 'Public' }}</span>
                                @else
                                    <span class="badge bg-warning">{{ 'Confidential' }}</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="/dashboard/{{ $link }}/{{ $regulation->id }}" class="badge bg-info"><i
                                        class="bi bi-eye-fill"></i></a>
                                <a href="/dashboard/{{ $link }}/{{ $regulation->id }}/edit"
                                    class="badge bg-warning"><i class="bi bi-pencil-fill"></i></a>
                                <form action="/dashboard/{{ $link }}/{{ $regulation->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('yakin mau dihapus?')"><i
                                            class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
    @endif

    {{-- IMPORT MODAL --}}
    <!-- Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Peraturan dengan Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('peraturanInternal.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Pilih file</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <button class="btn btn-success me-2">Import</button>
                        <a href="{{ asset('template-excel-import/test-template1.xlsx') }}" target="_blank"
                            class="btn btn-outline-success">Download
                            Template</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- IMPORT MODAL --}}
@endsection

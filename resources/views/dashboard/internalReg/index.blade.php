@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Peraturan Internal Perusahaan</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($regulations->count())
        <div class="table-responsive">
            <a href="/dashboard/peraturan_internal/create" class="btn btn-primary mb-3">Tambah peraturan baru</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $regulation->nomor_peraturan }}</td>
                            <td>{!! $regulation->tentang !!}</td>
                            <td>
                                <a href="/dashboard/peraturan_internal/{{ $regulation->id }}" class="badge bg-info"><i
                                        class="bi bi-eye-fill"></i></a>
                                <a href="#" class="badge bg-warning"><i class="bi bi-pencil-fill"></i></a>
                                <a href="#" class="badge bg-danger"><i class="bi bi-trash3-fill"></i></a>
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

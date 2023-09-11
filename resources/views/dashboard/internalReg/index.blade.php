@extends('dashboard.layouts.main')
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Peraturan Internal Perusahaan</h1>
        </div>
        @if ($regulations->count())
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nomor Peraturan</th>
                            <th scope="col">Tentang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    @foreach ($regulations as $regulation)
                        <tbody>
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
                        </tbody>
                    @endforeach
                @else
                    <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
        @endif
        </table>
        </div>
    </main>
@endsection

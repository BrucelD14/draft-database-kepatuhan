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

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3">Tambah peraturan baru</a>
    @if ($regulations->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Tentang</th>
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
@endsection

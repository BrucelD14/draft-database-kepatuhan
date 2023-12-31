@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="col-md-8">

            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3">Tambah Jenis Peraturan</a>

    @if ($jenisPeraturan->count())
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Jenis Peraturan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @foreach ($jenisPeraturan as $item)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->nama }}</td>
                                <td class="text-center">
                                    <a href="/dashboard/{{ $link }}/{{ $item->id }}/edit"
                                        class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p class="text-center fs-4 mt-3">Tidak ada jenis peraturan tersedia! <i class="bi bi-emoji-frown"></i></p>
    @endif
@endsection

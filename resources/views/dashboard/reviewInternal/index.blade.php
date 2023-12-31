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

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3">Tambah Reviu</a>
    <div class="col-lg-6">
        <form method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ketik kata kunci ..." name="search"
                    value="{{ $search }}" autofocus>
                <button class="btn btn-primary px-4" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
    </div>

    @if ($regulations->count())
        <table class="table table-striped">
            <thead>
                <tr class="text-center align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Nomor Peraturan Direksi</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @php
                    $numb = 1 + ($regulations->currentPage() - 1) * $regulations->perPage();
                @endphp
                @foreach ($regulations as $regulation)
                    <tr class="align-middle">
                        {{-- <td class="text-center">{{ $loop->iteration }}</td> --}}
                        <td class="text-center">{{ $numb++ }}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($regulation->created_at)->translatedFormat('d F Y') }}</td>
                        <td class="text-center">{{ $regulation->kpde }}</td>
                        <td style="text-align:justify">{!! $regulation->tentang_peraturan !!}</td>
                        <td class="text-center">
                            <a href="/dashboard/{{ $link }}/{{ $regulation->id }}" class="badge bg-info"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="/dashboard/{{ $link }}/{{ $regulation->id }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-fill"></i></a>
                            <form action="/dashboard/{{ $link }}/{{ $regulation->id }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('yakin mau dihapus?')"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                @endforeach
            </tbody>
        @else
            <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
    @endif
    </table>
    {!! $regulations->appends(Request::except('page'))->render() !!}
@endsection

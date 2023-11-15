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

    <a href="/dashboard/{{ $link }}/create" class="btn btn-primary mb-3">Tambah Peraturan</a>
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
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nomor Peraturan</th>
                    <th scope="col">Tentang</th>
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
                        <td class="text-center">{{ $regulation->nomor_peraturan }}</td>
                        <td style="text-align:justify">{!! $regulation->tentang !!}</td>
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

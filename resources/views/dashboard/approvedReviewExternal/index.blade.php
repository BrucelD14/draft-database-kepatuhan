@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Approved | {{ $title }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

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
                    <th scope="col">Nomor Peraturan</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Status Publish</th>
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
                            <a href="/dashboard/{{ $link }}/{{ $regulation->id }}"
                                class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i> Detail</a>
                        </td>
                    </tr>
                    <tr>
                @endforeach
            </tbody>
        @else
            <p class="text-center fs-4 mt-3">No review found <i class="bi bi-emoji-frown"></i></p>
    @endif
    </table>
@endsection

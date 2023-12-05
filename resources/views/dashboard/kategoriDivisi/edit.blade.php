@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit {{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/{{ $link }}/{{ $kategori->id }}" class="">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="div_code" class="form-label">Kode Divisi</label>
                <input type="text" class="form-control @error('div_code') is-invalid @enderror" id="div_code"
                    name=" div_code" required autofocus value="{{ old('div_code', $kategori->div_code) }}"
                    placeholder="masukkan kode divisi">
                @error('div_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="div_name" class="form-label">Nama Divisi</label>
                <input type="text" class="form-control @error('div_name') is-invalid @enderror" id="div_name"
                    name=" div_name" required autofocus value="{{ old('div_name', $kategori->div_name) }}"
                    placeholder="masukkan nama divisi">
                @error('div_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary my-2 me-2">Edit Divisi</button>
            </div>
        </form>

        <div class="">
            <form action="/dashboard/{{ $link }}/{{ $kategori->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('yakin mau dihapus?')"><i
                        class="bi bi-trash3-fill"></i> Hapus</button>
            </form>
        </div>

    </div>
@endsection

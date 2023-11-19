@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/{{ $link }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kppp" class="form-label">Ketentuan Peraturan Perundang-undangan</label>
                <input type="text" class="form-control @error('kppp') is-invalid @enderror" id="kppp" name="kppp"
                    required autofocus value="{{ old('kppp') }}">
                @error('kppp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kpde" class="form-label">Ketentuan Peraturan Direksi Eksisting</label>
                <input type="text" class="form-control @error('kpde') is-invalid @enderror" id="kpde" name="kpde"
                    required autofocus value="{{ old('kpde') }}">
                @error('kpde')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tentang_peraturan" class="form-label">Tentang</label>
                <textarea type="text" class="form-control @error('tentang_peraturan') is-invalid @enderror" id="tentang_peraturan"
                    name="tentang_peraturan" required value="{{ old('tentang_peraturan') }}" placeholder="Masukkan judul peraturan"></textarea>
                @error('tentang_peraturan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan_status" class="form-label">Keterangan status</label>
                <textarea type="text" class="form-control @error('keterangan_status') is-invalid @enderror" id="keterangan_status"
                    name="keterangan_status" required value="{{ old('keterangan_status') }}"
                    placeholder="Masukkan status keterangan peraturan"></textarea>
                @error('keterangan_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dokumen" class="form-label">Dokumen Reviu</label>
                <input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen"
                    name="dokumen" required>
                @error('dokumen')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Reviu</button>
        </form>
    </div>
@endsection

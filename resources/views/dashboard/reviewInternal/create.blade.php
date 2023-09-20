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
                @error('tentang_peraturan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="tentang_peraturan" type="hidden" name="tentang_peraturan"
                    value="{{ old('tentang_peraturan') }}">
                <trix-editor input="tentang_peraturan"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="keterangan_status" class="form-label">Keterangan Status</label>
                <input id="keterangan_status" type="hidden" name="keterangan_status"
                    value="{{ old('keterangan_status') }}">
                <trix-editor input="keterangan_status"></trix-editor>
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

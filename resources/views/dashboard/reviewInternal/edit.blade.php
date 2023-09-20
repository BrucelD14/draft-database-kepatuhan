@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> {{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/{{ $link }}/{{ $regulation->id }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kppp" class="form-label">Ketentuan Peraturan Perundang-undangan</label>
                <input type="text" class="form-control @error('kppp') is-invalid @enderror" id="kppp" name="kppp"
                    required autofocus value="{{ old('kppp', $regulation->kppp) }}">
                @error('kppp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kpde" class="form-label">Ketentuan Peraturan Direksi Eksisting</label>
                <input type="text" class="form-control @error('kpde') is-invalid @enderror" id="kpde" name="kpde"
                    required autofocus value="{{ old('kpde', $regulation->kpde) }}">
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
                    value="{{ old('tentang_peraturan', $regulation->tentang_peraturan) }}">
                <trix-editor input="tentang_peraturan"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="keterangan_status" class="form-label">Status</label>
                @error('keterangan_status')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="keterangan_status" type="hidden" name="keterangan_status"
                    value="{{ old('keterangan_status', $regulation->keterangan_status) }}">
                <trix-editor input="keterangan_status"></trix-editor>
            </div>
            <div class="mb-4">
                <label for="dokumen" class="form-label">Dokumen Reviu</label>
                <input type="hidden" name="oldDokumen" value="{{ $regulation->dokumen }}">
                <input type="file" class="form-control" id="dokumen" name="dokumen">
                <span class="d-block mt-1">File: <a class="text-decoration-none"
                        href="{{ Storage::url($regulation->dokumen) }}"
                        target="_blank">{{ $regulation->dokumen }}</a></span>
            </div>
            <button type="submit" class="btn btn-primary">Edit Reviu</button>
        </form>
    </div>
@endsection

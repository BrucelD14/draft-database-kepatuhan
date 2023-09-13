@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Peraturan Internal Perusahaan</h1>
    </div>

    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/peraturan_internal">
            @csrf
            <div class="mb-3">
                <label for="nomor_peraturan" class="form-label">Nomor peraturan</label>
                <input type="text" class="form-control @error('nomor_peraturan') is-invalid @enderror" id="nomor_peraturan"
                    name="nomor_peraturan" required autofocus value="{{ old('nomor_peraturan') }}">
                @error('nomor_peraturan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_penetapan" class="form-label">Tanggal penetapan</label>
                <input type="date" class="form-control @error('tanggal_penetapan') is-invalid @enderror"
                    id="tanggal_penetapan" name="tanggal_penetapan" required value="{{ old('tanggal_penetapan') }}">
                @error('tanggal_penetapan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tentang" class="form-label">Tentang</label>
                @error('tentang')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="tentang" type="hidden" name="tentang" value="{{ old('tentang') }}">
                <trix-editor input="tentang"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="jenis_peraturan" class="form-label">Jenis peraturan</label>
                <input type="text" class="form-control @error('jenis_peraturan') is-invalid @enderror"
                    id="jenis_peraturan" name="jenis_peraturan" required value="{{ old('jenis_peraturan') }}">
                @error('jenis_peraturan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan_status" class="form-label">Keterangan status</label>
                <input id="keterangan_status" type="hidden" name="keterangan_status">
                <trix-editor input="keterangan_status"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="dokumen" class="form-label">Upload dokumen</label>
                <input type="file" class="form-control" id="dokumen" name="dokumen">
            </div>
            <button type="submit" class="btn btn-primary">Tambah peraturan</button>
        </form>
    </div>


    <script>
        const peraturan = document.querySelector('#nomor_peraturan');
        const slug = document.querySelector('#slug');

        peraturan.addEventListener('change', function() {
            fetch('/dashboard/peraturan_internal/checkSlug?nomor_peraturan=' + peraturan.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection

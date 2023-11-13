@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/{{ $link }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor_peraturan" class="form-label">Nomor peraturan</label>
                <input type="text" class="form-control @error('nomor_peraturan') is-invalid @enderror"
                    id="nomor_peraturan" name="nomor_peraturan" required autofocus value="{{ old('nomor_peraturan') }}">
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
            {{-- <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="tentang" class="form-label">Tentang</label>
                <textarea type="text" class="form-control @error('tentang') is-invalid @enderror" id="tentang" name="tentang"
                    required value="{{ old('tentang') }}" placeholder="Masukkan judul peraturan"></textarea>
                @error('tentang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_peraturan_internal" class="form-label">Jenis Peraturan</label>
                <select class="form-select" name="jenis_peraturan_internal_id">
                    @foreach ($jenis_peraturan as $jenis)
                        @if (old('jenis_peraturan_internal_id') == $jenis->id)
                            <option value="{{ $jenis->id }}" selected>{{ $jenis->nama }}</option>
                        @else
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="visibility" class="form-label">Visibilitas</label>
                <select class="form-select" name="visibility">
                    <option value="public">Public</option>
                    <option value="confidential">Confidential</option>
                </select>
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
                <label for="dokumen" class="form-label">Dokumen peraturan</label>
                <input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen"
                    name="dokumen" required>
                @error('dokumen')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Peraturan</button>
        </form>
    </div>


    {{-- <script>
        const peraturan = document.querySelector('#nomor_peraturan');
        const slug = document.querySelector('#slug');

        peraturan.addEventListener('change', function() {
            fetch('/dashboard/peraturan_internal/checkSlug?nomor_peraturan=' + peraturan.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script> --}}
@endsection

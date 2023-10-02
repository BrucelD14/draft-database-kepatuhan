@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/{{ $link }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor_peraturan" class="form-label">Nomor Peraturan</label>
                <input type="text" class="form-control @error('nomor_peraturan') is-invalid @enderror"
                    id="nomor_peraturan" name="nomor_peraturan" required autofocus value="{{ old('nomor_peraturan') }}"
                    placeholder="Isi nomor peraturan">
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
                <label for="jenis_peraturan_eksternal" class="form-label">Jenis Peraturan</label>
                <select class="form-select" name="jenis_peraturan_eksternal_id">
                    @foreach ($jenis_peraturan as $jenis)
                        @if (old('jenis_peraturan_eksternal_id') == $jenis->id)
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
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
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
                <label for="ringkasan" class="form-label">Ringkasan</label>
                <input id="ringkasan" type="hidden" name="ringkasan" value="{{ old('ringkasan') }}">
                <trix-editor input="ringkasan"></trix-editor>
            </div>
            {{-- <div class="mb-3">
                <label for="divisi" class="form-label">Divisi/Unit Terkait</label>
                <input type="text" class="form-control @error('divisi') is-invalid @enderror" id="divisi"
                    name="divisi" required value="{{ old('divisi') }}">
                @error('divisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi/Unit Terkait</label>
                <select class="form-select" id="multiple-select-field" name="divisi[]"
                    data-placeholder="Pilih divisi/unit terkait" multiple required>
                    @foreach ($kategori_divisi as $divisi)
                        @if (old('divisi[]') == $divisi->id)
                            <option value="{{ $divisi->id }}" selected>{{ $divisi->nama }}</option>
                        @else
                            <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="edisi" class="form-label">Edisi</label>
                <input type="date" class="form-control @error('edisi') is-invalid @enderror" id="edisi"
                    name="edisi" required value="{{ old('edisi') }}">
                @error('edisi')
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

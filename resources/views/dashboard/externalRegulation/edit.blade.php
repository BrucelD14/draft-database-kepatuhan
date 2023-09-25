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
                <label for="nomor_peraturan" class="form-label">Nomor peraturan</label>
                <input type="text" class="form-control @error('nomor_peraturan') is-invalid @enderror"
                    id="nomor_peraturan" name="nomor_peraturan" required autofocus
                    value="{{ old('nomor_peraturan', $regulation->nomor_peraturan) }}">
                @error('nomor_peraturan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_penetapan" class="form-label">Tanggal penetapan</label>
                <input type="date" class="form-control @error('tanggal_penetapan') is-invalid @enderror"
                    id="tanggal_penetapan" name="tanggal_penetapan" required
                    value="{{ date('Y-m-d', strtotime(old('tanggal_penetapan', $regulation->tanggal_penetapan))) }}">
                @error('tanggal_penetapan')
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
                <input id="tentang" type="hidden" name="tentang" value="{{ old('tentang', $regulation->tentang) }}">
                <trix-editor input="tentang"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="jenis_peraturan_eksternal" class="form-label">Jenis Peraturan</label>
                <select class="form-select" name="jenis_peraturan_eksternal_id">
                    @foreach ($jenis_peraturan as $jenis)
                        @if (old('jenis_peraturan_eksternal_id', $regulation->jenis_peraturan_eksternal_id) == $jenis->id)
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
                <label for="keterangan_status" class="form-label">Keterangan status</label>
                <input id="keterangan_status" type="hidden" name="keterangan_status"
                    value="{{ old('keterangan_status', $regulation->keterangan_status) }}">
                <trix-editor input="keterangan_status"></trix-editor>
            </div>
            <div class="mb-4">
                <label for="dokumen" class="form-label">Dokumen peraturan</label>
                <input type="hidden" name="oldDokumen" value="{{ $regulation->dokumen }}">
                <input type="file" class="form-control" id="dokumen" name="dokumen">
                <span class="d-block mt-1">File: <a class="text-decoration-none"
                        href="{{ Storage::url($regulation->dokumen) }}"
                        target="_blank">{{ $regulation->dokumen }}</a></span>
            </div>
            <button type="submit" class="btn btn-primary">Edit Peraturan</button>
        </form>
    </div>
@endsection

@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Peraturan Internal Perusahaan</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/peraturan_internal">
            @csrf
            <div class="mb-3">
                <label for="nomor_peraturan" class="form-label">Nomor peraturan</label>
                <input type="text" class="form-control" id="nomor_peraturan" name="nomor_peraturan">
            </div>
            <div class="mb-3">
                <label for="tanggal_penetapan" class="form-label">Tanggal penetapan</label>
                <input type="date" class="form-control" id="tanggal_penetapan" name="tanggal_penetapan">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="mb-3">
                <label for="jenis_peraturan" class="form-label">Jenis peraturan</label>
                <input type="text" class="form-control" id="jenis_peraturan" name="jenis_peraturan">
            </div>
            <div class="mb-3">
                <label for="dokumen" class="form-label">Upload dokumen</label>
                <input type="file" class="form-control" id="dokumen" name="dokumen">
            </div>
            <button type="submit" class="btn btn-primary">Tambah peraturan</button>
        </form>
    </div>
@endsection

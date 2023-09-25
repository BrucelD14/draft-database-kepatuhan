@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row text-center py-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Peraturan Internal Perusahaan</h5>
                    <p class="card-text">Judul Peraturan Terbaru</p>
                    <a href="/peraturan_internal_perusahaan" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Peraturan Eksternal Berkaitan Bisnis Proses</h5>
                    <p class="card-text">Judul Peraturan Terbaru</p>
                    <a href="/peraturan_eksternal" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Peraturan Menteri BUMN</h5>
                    <p class="card-text">Judul Peraturan Terbaru</p>
                    <a href="/peraturan_menteri_bumn" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-4 justify-content-center text-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Review Peraturan Internal</h5>
                    <p class="card-text">Judul Review Terbaru</p>
                    <a href="/reviu_peraturan_internal" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Review Peraturan Eksternal</h5>
                    <p class="card-text">Judul Review Terbaru</p>
                    <a href="/reviu_peraturan_eksternal" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection

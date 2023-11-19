@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row justify-content-between text-center py-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Matriks Peraturan Internal PT INKA (Persero)</h4>
                    <p class="card-text">Menampilkan jumlah peraturan internal tahun 2023</p>
                    <a href="/matriks/peraturan_internal" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Matriks Reviu Peraturan Eksternal PT INKA (Persero)</h4>
                    <p class="card-text">Menampilkan jumlah reviu peraturan eksternal tahun 2023</p>
                    <a href="/matriks/peraturan_eksternal" class="btn btn-danger">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-4 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-title m-0 fw-semibold" style="font-size:21px;">Peraturan Internal Perusahaan</p>
                        <div class="bg-primary p-2 text-center rounded text-white">
                            <i class="bi bi-file-earmark-text d-flex align-items-center"></i>
                        </div>
                    </div>
                    <p class="card-text mt-2 fs-1 fw-bold">21</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-title m-0 fw-semibold" style="font-size:21px;">Peraturan Eksternal</p>
                        <div class="bg-primary p-2 text-center rounded text-white">
                            <i class="bi bi-file-earmark-x d-flex align-items-center"></i>
                        </div>
                    </div>
                    <p class="card-text mt-2 fs-1 fw-bold">21</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-title m-0 fw-semibold" style="font-size:21px;">Peraturan Menteri BUMN</p>
                        <div class="bg-primary p-2 text-center rounded text-white">
                            <i class="bi bi-file-earmark-minus d-flex align-items-center"></i>
                        </div>
                    </div>
                    <p class="card-text mt-2 fs-1 fw-bold">21</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-4 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-title m-0 fw-semibold" style="font-size:21px;"> Reviu Peraturan Internal</p>
                        <div class="bg-primary p-2 text-center rounded text-white">
                            <i class="bi bi-file-earmark-text-fill d-flex align-items-center"></i>
                        </div>
                    </div>
                    <p class="card-text mt-2 fs-1 fw-bold">21</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-title m-0 fw-semibold" style="font-size:21px;">Reviu Peraturan Eksternal</p>
                        <div class="bg-primary p-2 text-center rounded text-white">
                            <i class="bi bi-file-earmark-x-fill d-flex align-items-center"></i>
                        </div>
                    </div>
                    <p class="card-text mt-2 fs-1 fw-bold mb-0">21</p>
                    <p class="m-0 fs-6 opacity-75">17 Approved</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        {!! $chart->container() !!}
    </div>
@endsection

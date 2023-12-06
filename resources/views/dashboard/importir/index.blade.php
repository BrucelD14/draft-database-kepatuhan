@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- PESAN SUKSES --}}

    {{-- PESAN ERROR --}}
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    {{-- PESAN ERROR --}}
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="{{ route('divisiimport.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5>IMPORTIR DIVISI</h5>
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" name="importir_divisi">
                    <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Import</button>
                </div>
            </form>
        </div>

        <div class="col-lg-8 mb-4">
            <form action="{{ route('jobpositionimport.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5>IMPORTIR JOB POSITION</h5>
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" name="importir_job_position">
                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Import</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('matriks.peraturanInternal.layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row justify-content-center text-center py-4">
        <div id="chart"></div>
    </div>
@endsection

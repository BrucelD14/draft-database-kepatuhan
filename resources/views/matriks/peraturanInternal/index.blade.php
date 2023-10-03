@extends('matriks.peraturanInternal.layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row py-2">
        {!! $chart->container() !!}
    </div>
@endsection

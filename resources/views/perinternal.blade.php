@extends('layouts.main')

@section('container')
    @foreach ($reg_list as $reg)
        <div class="card mb-2">
            <div class="card-header">
                {{ $reg->nomor_peraturan }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $reg->nomor_peraturan }}</h5>
                <article>
                    {!! $reg->tentang !!}
                </article>
                <btn class="btn btn-primary disabled">{{ $reg->status }}</btn>
            </div>
        </div>
    @endforeach
@endsection

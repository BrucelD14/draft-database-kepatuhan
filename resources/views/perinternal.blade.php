@extends('layouts.main')

@section('container')
    @foreach ($reg_list as $reg)
        <div class="card mb-2">
            <div class="card-header">
                {{ $reg['numb_reg'] }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $reg['date_reg'] }}</h5>
                <p class="card-text">{{ $reg['desc_reg'] }}</p>
                <btn class="btn btn-primary disabled">{{ $reg['status'] }}</btn>
            </div>
        </div>
    @endforeach
@endsection

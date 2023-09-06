@extends('layouts.main')

@section('container')
    @foreach ($reg_list as $reg)
        <div class="card mb-4">
            <div class="card-header">
                Ketentuan Peraturan Perundang-undangan : {{ $reg->kppp }}
            </div>
            <div class="card-body">
                <h5 class="card-title fw-bold pb-2">Ketentuan Peraturan Direksi Eksisting : {{ $reg->kpde }}</h5>
                <article class="fs-6">
                    <strong>Tentang peraturan : </strong>{!! $reg->tentang_peraturan !!}
                    <br>
                    <hr>
                    <strong>Keterangan status : </strong>{!! $reg->keterangan_status !!}
                </article>
            </div>
        </div>
    @endforeach
@endsection

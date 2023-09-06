@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/regulations" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik kata kunci">
                    <button class="btn btn-info" type="button" id="button-addon2">Cariin boss</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($reg_list as $reg)
        <div class="card mb-2">
            <div class="card-header">
                {{ $reg->nomor_peraturan }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $reg->jenis_peraturan }}</h5>
                <article class="mb-2 fs-5">
                    {!! $reg->tentang !!}
                </article>

                <btn class="btn btn-info disabled">
                    @if ($reg->status == 1)
                        {{ 'Berlaku' }}
                    @else
                        {{ 'Tidak Berlaku' }}
                    @endif
                </btn>
                <div class="mt-2">
                    <strong>Keterangan: </strong> {!! $reg->keterangan !!}
                </div>
            </div>
        </div>
    @endforeach
@endsection

@extends('layouts.main')

@section('container')
    <div class="row mb-4">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/produk_hukum/{{ $active }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik kata kunci" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>

    @if ($reg_list->count())
        @foreach ($reg_list as $reg)
            <div class="card mb-4">
                <div class="card-header">
                    Nomor surat : {{ $reg->nomor_peraturan }}
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $reg->jenis_peraturan }}</h5>
                    <article class="mb-2 fs-5">
                        Tentang : {!! $reg->tentang !!}
                    </article>

                    <btn class="btn btn-info disabled">
                        @if ($reg->status == 1)
                            {{ 'Berlaku' }}
                        @else
                            {{ 'Tidak Berlaku' }}
                        @endif
                    </btn>
                    <div class="mt-2">
                        <strong>Keterangan: </strong> {!! $reg->keterangan_status !!}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
    @endif

    {{ $reg_list->links() }}
@endsection

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

    {{-- <div class="card mb-4">
        
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
            </div> --}}


    @if ($reg_list->count())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-info text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Jenis Peraturan</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                @foreach ($reg_list as $reg)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reg->nomor_peraturan }}</td>
                            <td>{{ $reg->jenis_peraturan }}</td>
                            <td>{!! $reg->tentang !!}</td>
                            <td>
                                @if ($reg->status == 'active')
                                    {{ 'Berlaku' }}
                                @else
                                    {{ 'Tidak Berlaku' }}
                                @endif
                            </td>
                            <td>{!! $reg->keterangan_status !!}</td>
                            <td><a href="#" class="badge bg-primary text-center"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                    </tbody>
                @endforeach
            @else
                <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
    @endif
    </table>
    </div>


    {{ $reg_list->links() }}
@endsection

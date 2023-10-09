@extends('layouts.main')

@section('container')
    <div class="row mb-4">
        <div class="col-md-10">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/{{ $active }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik kata kunci" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit" id="button-addon2">Cari</button>
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
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-danger text-center align-middle">
                        <th scope="col">No</th>
                        <th scope="col">Nomor Peraturan</th>
                        <th scope="col">Tanggal Penetapan</th>
                        <th scope="col">Jenis Peraturan</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Dokumen</th>
                    </tr>
                </thead>

                @foreach ($reg_list as $reg)
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $reg->nomor_peraturan }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($reg->tanggal_penetapan)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">{{ $reg->jenisPeraturanInternal->nama }}</td>
                            <td style="text-align:justify">{!! $reg->tentang !!}</td>
                            <td class="text-center">
                                @if ($reg->status == 'active')
                                    {{ 'Berlaku' }}
                                @else
                                    {{ 'Tidak Berlaku' }}
                                @endif
                            </td>
                            <td style="text-align:justify">{!! $reg->keterangan_status !!}</td>
                            <td class="text-center"><a href="{{ asset('storage/' . $reg->dokumen) }}" target="_blank"
                                    class="btn btn-danger"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                    </tbody>
                @endforeach
            @else
                <p class="text-center fs-4 mt-3">No regulation found <i class="bi bi-emoji-frown"></i></p>
            </table>
        </div>
    @endif


    {{ $reg_list->links() }}
@endsection

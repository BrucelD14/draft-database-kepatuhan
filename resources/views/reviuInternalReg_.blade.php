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

    <div class="row">
        @if ($reg_list->count())
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-danger text-center align-middle">
                            <th scope="col">Ketentuan Peraturan Perundang-undangan</th>
                            <th scope="col">Ketentuan Peraturan Direksi Eksisting</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Dokumen</th>
                        </tr>
                    </thead>

                    @foreach ($reg_list as $reg)
                        <tbody>
                            <tr class="align-middle">
                                <td class="text-center">{{ $reg->kppp }}</td>
                                <td class="text-center">{{ $reg->kpde }}</td>
                                <td style="text-align:justify">{!! $reg->tentang_peraturan !!}</td>
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
    </div>
    <div class="">{{ $reg_list->links() }}</div>
@endsection

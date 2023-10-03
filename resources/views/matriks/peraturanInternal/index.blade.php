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
    <div class="row py-3">
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary text-center">
                    <th scope="col">#</th>
                    <th scope="col">Jenis Peraturan</th>
                    @foreach ($periode as $p)
                        <th scope="col">{{ $p }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th scope="row">1</th>
                    <td>Peraturan Direksi</td>
                    @foreach ($peraturanDireksi as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
                <tr class="text-center">
                    <th scope="row">2</th>
                    <td>Surat Edaran</td>
                    @foreach ($suratEdaran as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection

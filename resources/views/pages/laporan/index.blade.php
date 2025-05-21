@php
    use App\Models\Penilaian;
    use App\Models\SubKriteria;
    use App\Models\Hasil;
@endphp
@extends('layouts.dashboard')
@section('title', 'Laporan')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Laporan</h3>
            <p class="text-subtitle text-muted">Laporan hasil menggunakan Bubble Sort.</p>
            @include('layouts.alert')
        </div>
        <section class="section">

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('laporan.create') }}">
                            <button class="btn btn-primary">Cetak Laporan</button>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Jurusan</th>
                                    <th>Total </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($hasils as $hasil)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hasil->alternatif->user->name }}</td>
                                        <td>{{ $hasil->alternatif->npm }}</td>
                                        <td>{{ $hasil->alternatif->jurusan }}</td>
                                        <td>{{ $hasil->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </section>
    </div>
@endsection
@push('script')
@endpush

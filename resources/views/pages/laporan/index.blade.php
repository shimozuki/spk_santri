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
                    @if ($bolehCetak)
                    <a href="{{ route('laporan.create') }}">
                        <button class="btn btn-primary">Cetak Laporan</button>
                    </a>
                    @else
                    <button class="btn btn-secondary" disabled>Belum Disetujui</button>
                    @endif
                    @if ($hasils->first() && $hasils->first()->status !== 'Disetujui')
                    <form action="{{ route('laporan.setujui') }}" method="POST" onsubmit="return confirm('Yakin ingin menyetujui hasil pemeringkatan?')">
                        @csrf
                        <button type="submit" class="btn btn-success">Setujui Pemeringkatan</button>
                    </form>
                    @endif
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr align="center">
                                <th>Peringkat</th>
                                <th>Nama</th>
                                <th>Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $peringkat = 1;
                            $hasil_terurut = $hasils->sortByDesc('nilai');
                            @endphp

                            @foreach ($hasil_terurut as $hasil)
                            <tr>
                                <td>{{ $peringkat++ }}</td>
                                <td>{{ $hasil->alternatif->nama_lengkap }}</td>
                                <td>{{ number_format($hasil->nilai, 2) }}</td>
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
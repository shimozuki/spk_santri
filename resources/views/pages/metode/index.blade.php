@php
    use App\Models\Penilaian;
    use App\Models\SubKriteria;
    use App\Models\Hasil;
@endphp
@extends('layouts.dashboard')
@section('title', 'Metode')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Metode</h3>
            <p class="text-subtitle text-muted">Hasil Analisa Metode Profile Matching.</p>
            @include('layouts.alert')
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Keputusan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                <td align="center">{{ $penilaian->subkriteria->nama }}</td>
                                            @endforeach

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Konversi Keputusan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                <td align="center">{{ $penilaian->subkriteria->nilai }}</td>
                                            @endforeach

                                        </tr>
                                    @endif
                                @endforeach
                                <tr align="center">
                                    <td colspan="2" class="font-weight-bold">Nilai Bobot Kriteria</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td class="font-weight-bold">{{ $kriteria->bobot }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Normalisasi GAP
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                @php
                                                    $normalisasiGap = $penilaian->subkriteria->nilai - $penilaian->kriteria->bobot;
                                                @endphp
                                                <td align="center">
                                                    {{ $normalisasiGap }}</td>
                                            @endforeach

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Pemetaan GAP
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                @php
                                                    $normalisasiGap = $penilaian->subkriteria->nilai - $penilaian->kriteria->bobot;
                                                    switch ($normalisasiGap) {
                                                        case '0':
                                                            $pemetaanGap = 5;
                                                            break;

                                                        case '1':
                                                            $pemetaanGap = 4.5;
                                                            break;

                                                        case '-1':
                                                            $pemetaanGap = 4;
                                                            break;

                                                        case '2':
                                                            $pemetaanGap = 3.5;
                                                            break;

                                                        case '-2':
                                                            $pemetaanGap = 3;
                                                            break;

                                                        case '3':
                                                            $pemetaanGap = 2.5;
                                                            break;

                                                        case '-3':
                                                            $pemetaanGap = 2;
                                                            break;

                                                        case '4':
                                                            $pemetaanGap = 1.5;
                                                            break;

                                                        case '-4':
                                                            $pemetaanGap = 1;
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }
                                                @endphp
                                                <td align="center">
                                                    {{ $pemetaanGap }}</td>
                                            @endforeach

                                        </tr>
                                    @endif
                                @endforeach
                                <tr align="center">
                                    <td colspan="2" class="font-weight-bold">Tipe Kriteria</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td class="font-weight-bold">{{ $kriteria->type }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Pengelompokan CF & SF
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->kode_kriteria }}</th>
                                    @endforeach
                                    <th>
                                        Total CF
                                    </th>
                                    <th>
                                        Total SF
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @php
                                        $ncf = 0.0;
                                        $nsf = 0.0;
                                        $tcf = 0;
                                        $tsf = 0;
                                    @endphp
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                @php
                                                    $normalisasiGap = $penilaian->subkriteria->nilai - $penilaian->kriteria->bobot;
                                                    switch ($normalisasiGap) {
                                                        case '0':
                                                            $pemetaanGap = 5;
                                                            break;

                                                        case '1':
                                                            $pemetaanGap = 4.5;
                                                            break;

                                                        case '-1':
                                                            $pemetaanGap = 4;
                                                            break;

                                                        case '2':
                                                            $pemetaanGap = 3.5;
                                                            break;

                                                        case '-2':
                                                            $pemetaanGap = 3;
                                                            break;

                                                        case '3':
                                                            $pemetaanGap = 2.5;
                                                            break;

                                                        case '-3':
                                                            $pemetaanGap = 2;
                                                            break;

                                                        case '4':
                                                            $pemetaanGap = 1.5;
                                                            break;

                                                        case '-4':
                                                            $pemetaanGap = 1;
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }

                                                    if ($penilaian->kriteria->type == 'Core Factor') {
                                                        $ncf += $pemetaanGap;
                                                        $tcf++;
                                                    } else {
                                                        $nsf += $pemetaanGap;
                                                        $tsf++;
                                                    }

                                                @endphp
                                                <td align="center">
                                                    {{ $pemetaanGap }}
                                                </td>
                                            @endforeach
                                            <td align="center">
                                                {{-- {{ $ncf / $tcf }} --}}
                                                {{ $ncf / $tcf }}
                                            </td>
                                            <td align="center">
                                                {{ $nsf / $tsf }}
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach
                                {{-- <tr align="center">
                                    <td colspan="2" class="font-weight-bold">Tipe Kriteria</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td class="font-weight-bold">{{ $kriteria->type }}</td>
                                    @endforeach
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Nilai Total
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                <tr align="center">
                                    <th style="width: 3%">No</th>
                                    <th>Nama Alternatif</th>
                                    <th>
                                        Total CF
                                    </th>
                                    <th>
                                        Total SF
                                    </th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alternatifs as $alternatif)
                                    @php
                                        $ncf = 0.0;
                                        $nsf = 0.0;
                                        $tcf = 0;
                                        $tsf = 0;
                                    @endphp
                                    @if ($alternatif->penilaian->count() == 0)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->user->name }}</td>

                                            @foreach ($alternatif->penilaian as $penilaian)
                                                @php
                                                    $normalisasiGap = $penilaian->subkriteria->nilai - $penilaian->kriteria->bobot;
                                                    switch ($normalisasiGap) {
                                                        case '0':
                                                            $pemetaanGap = 5;
                                                            break;

                                                        case '1':
                                                            $pemetaanGap = 4.5;
                                                            break;

                                                        case '-1':
                                                            $pemetaanGap = 4;
                                                            break;

                                                        case '2':
                                                            $pemetaanGap = 3.5;
                                                            break;

                                                        case '-2':
                                                            $pemetaanGap = 3;
                                                            break;

                                                        case '3':
                                                            $pemetaanGap = 2.5;
                                                            break;

                                                        case '-3':
                                                            $pemetaanGap = 2;
                                                            break;

                                                        case '4':
                                                            $pemetaanGap = 1.5;
                                                            break;

                                                        case '-4':
                                                            $pemetaanGap = 1;
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }

                                                    if ($penilaian->kriteria->type == 'Core Factor') {
                                                        $ncf += $pemetaanGap;
                                                        $tcf++;
                                                    } else {
                                                        $nsf += $pemetaanGap;
                                                        $tsf++;
                                                    }

                                                @endphp
                                            @endforeach
                                            <td align="center">
                                                {{ $ncf / $tcf }}

                                            </td>
                                            <td align="center">
                                                {{ $nsf / $tsf }}
                                            </td>
                                            <td>
                                                {{ (($ncf / $tcf) * 60 + ($nsf / $tsf) * 40) / 100 }}
                                            </td>
                                        </tr>
                                        @php
                                            Hasil::create([
                                                'alternatif_id' => $alternatif->id,
                                                'nilai' => (($ncf / $tcf) * 60 + ($nsf / $tsf) * 40) / 100,
                                            ]);
                                        @endphp
                                    @endif
                                @endforeach
                                {{-- <tr align="center">
                                    <td colspan="2" class="font-weight-bold">Tipe Kriteria</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td class="font-weight-bold">{{ $kriteria->type }}</td>
                                    @endforeach
                                </tr> --}}
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

@include('components.dashboard._head')
@include('components.dashboard._styles')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Hasil Pilmapres IIB Darmaja - {{ date('Y') }}</title>
</head>

<body>
    <div class="container ">
        <div class="mb-4">
            <div class="col-12 mt-5 mb-5 text-center">

                <table width="100%" style="margin-bottom: 30px; border-bottom: 3px solid black;">
                    <tr>
                        <td width="15%" align="center">
                            <img src="{{ asset('logo-.png') }}" width="100%">
                        </td>
                        <td align="center">
                            <h4 style="margin: 0; font-weight: bold;">YAYASAN NURUL ISLAM SUMBAWA</h4>
                            <h4 style="margin: 0; font-weight: bold;">PONDOK PESANTREN AISYAH SAMAWA</h4>
                            <p style="margin: 0;">
                                Jln. Pramuka RT 002 RW 001, Kel. BRANG BIJI, SUMBAWA, NTB<br>
                                Email: <i>ponpesaisyahsamawa@gmail.com</i> &nbsp;&nbsp;
                                Fanspage: Pondok Pesantren Aisyah Samawa
                            </p>
                        </td>
                    </tr>
                </table>

                <h4 class="font-weight-bold">LAPORAN HASIL KELULUSAN SANTRI {{ date('Y') }}</h4>
                <h4 class="font-weight-bold">METODE PROFILE MATCHING</h4>
                @include('layouts.alert')
            </div>
            <section class="section mb-5">

                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr align="center">
                                <th>Peringkat</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
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
                                <td>{{ $hasil->alternatif->nisn ?? '-' }}</td>
                                <td>{{ $hasil->alternatif->nis ?? '-' }}</td>
                                <td>{{ $hasil->alternatif->nama_lengkap }}</td>
                                <td>{{ $hasil->alternatif->kelas ?? '-' }}</td>
                                <td>{{ $hasil->alternatif->tahun_ajaran ?? '-' }}</td>
                                <td>{{ number_format($hasil->nilai, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </section>
            <div class="d-flex justify-content-end">
                Sumbawa, {{ date('D m Y') }}
                <br>
                Kepala Sekolah
                <br>
                <br>
                <br>
                <br>
                Rodianto, S.kom., M.kom
                <br>
                NIK. 13370514
            </div>

        </div>
    </div>
</body>

<script>
    window.print();
</script>


@include('components.dashboard._scripts')

</html>
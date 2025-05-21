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
                    <h4 class="font-weight-bold">LAPORAN HASIL ANALISA PILMAPRES IIB DARMAJAYA {{ date('Y') }}</h4>
                    <h4 class="font-weight-bold">METODE PROFILE MATCHING & BUBBLE SORT</h4>
                    @include('layouts.alert')
                </div>
                <section class="section mb-5">

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



                </section>
                <div class="d-flex justify-content-end">
                    Bandar Lampung, {{ date('D m Y') }}
                    <br>
                    Wakil Rektor III IIB Darmajaya
                    <br>
                    <br>
                    <br>
                    <br>
                    Muprihan Thaib, S.Sos., M.M
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

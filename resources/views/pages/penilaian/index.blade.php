@extends('layouts.dashboard')
@section('title', 'Penilaian')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Penilaian</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi penilaian.</p>
            @include('layouts.alert')
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('alternatif.create') }}">
                            {{-- <button class="btn btn-primary">Tambah Alternatif</button> --}}
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-lg" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Nama</th>
                                    <th>Npm</th>
                                    <th>Jurusan</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $alternatif)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alternatif->user->name }}</td>
                                        <td>{{ $alternatif->npm }}</td>
                                        <td>{{ $alternatif->jurusan }}</td>

                                        <td>
                                            @if ($alternatif->penilaian->count() == 0)
                                                <a href="{{ route('penilaian.show', $alternatif) }}"
                                                    class="btn btn-sm btn-icon btn-success m-1"><i
                                                        class="fas fa-plus"></i></a>
                                            @else
                                                <a href="{{ route('penilaian.edit', $alternatif) }}"
                                                    class="btn btn-sm btn-icon btn-warning m-1"><i
                                                        class="fas fa-pen"></i></a>
                                            @endif
                                        </td>
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

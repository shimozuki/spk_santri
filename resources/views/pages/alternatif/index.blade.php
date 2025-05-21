@extends('layouts.dashboard')
@section('title', 'Alternatif')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Alternatif</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi alternatif.</p>
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
                                    <th>No Telephon</th>
                                    <th>Karya Tulis</th>
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
                                        <td>{{ $alternatif->no_telp }}</td>
                                        <td>
                                            <a href="{{ asset('file/karya/' . $alternatif->karya_tulis) }}"
                                                target="_blank">Lihat</a>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('alternatif.show', $alternatif) }}"
                                                    class="btn btn-sm btn-icon btn-warning m-1"><i
                                                        class="fas fa-eye"></i></a>
                                                @if (Auth::user()->role != 'Juri')
                                                    <a href="{{ route('alternatif.edit', $alternatif) }}"
                                                        class="btn btn-sm btn-icon btn-success m-1"><i
                                                            class="fas fa-pen"></i></a>
                                                    <form action="{{ route('alternatif.destroy', $alternatif) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger btn-icon m-1">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
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

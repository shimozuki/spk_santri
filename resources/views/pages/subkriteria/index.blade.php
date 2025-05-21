@extends('layouts.dashboard')
@section('title', 'SubKriteria')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Sub Kriteria | {{ $kriteria->nama }}</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah subkriteria {{ $kriteria->nama }}.</p>
            @include('layouts.alert')
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('subkriteria.create', $kriteria) }}">
                            <button class="btn btn-primary">Tambah SubKriteria</button>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-lg" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Nama Sub Kriteria</th>
                                    <th>Nilai</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subkriterias as $subkriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subkriteria->nama }}</td>
                                        <td>{{ $subkriteria->nilai }}</td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('subkriteria.show', [$subkriteria, $kriteria]) }}"
                                                    class="btn btn-sm btn-icon btn-success m-1"><i
                                                        class="fas fa-pen"></i></a>
                                                <form action="{{ route('subkriteria.destroy', [$subkriteria, $kriteria]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger btn-icon m-1">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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

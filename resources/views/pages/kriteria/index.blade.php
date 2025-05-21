@extends('layouts.dashboard')
@section('title', 'Kriteria')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>Kriteria</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi kriteria.</p>
            @include('layouts.alert')
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('kriteria.create') }}">
                            <button class="btn btn-primary">Tambah Kriteria</button>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-lg" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Tipe</th>
                                    <th>Bobot</th>
                                    <th>SubKriteria</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kriteria->kode_kriteria }}</td>
                                        <td>{{ $kriteria->nama }}</td>
                                        <td>{{ $kriteria->type }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>
                                            <a href="{{ route('subkriteria.index', $kriteria) }}"
                                                class="btn btn-sm btn-icon btn-warning m-1"><i class="fas fa-plus"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('kriteria.show', $kriteria) }}"
                                                    class="btn btn-sm btn-icon btn-success m-1"><i
                                                        class="fas fa-pen"></i></a>
                                                <form action="{{ route('kriteria.destroy', $kriteria) }}" method="post">
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

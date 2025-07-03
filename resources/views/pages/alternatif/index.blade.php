@extends('layouts.dashboard')
@section('title', 'Alternatif')
@push('style')
@endpush

@section('main')
<div class="mb-4">
    <div class="col-12 order-md-1 order-last">
        <h3>Santri</h3>
        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Santri.</p>
        @include('layouts.alert')
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <a href="{{ route('alternatif.create') }}">
                        <button class="btn btn-primary">Tambah Santri</button>
                    </a>
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-lg" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 3%">No</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th>Nilai Akhir</th>
                                <th>Keterangan</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $alternatif->nisn }}</td>
                                <td>{{ $alternatif->nilai_akhir ?? '-' }}</td>
                                <td>{{ $alternatif->keterangan_lulus ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if (Auth::user()->role != 'Juri')
                                        <a href="{{ route('alternatif.edit', $alternatif) }}"
                                            class="btn btn-sm btn-icon btn-success m-1">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('alternatif.destroy', $alternatif) }}" method="post" class="form-hapus">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger btn-icon btn-delete m-1">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
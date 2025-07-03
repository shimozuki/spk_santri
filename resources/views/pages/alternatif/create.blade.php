@extends('layouts.dashboard')
@section('title', 'Alternatif')
@push('style')
@endpush

@section('main')
<div class="mb-4">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tambah Alternatif</h3>
        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat menambah informasi alternatif.</p>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('alternatif.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        class="form-control @error('nama_lengkap') is-invalid @enderror" required>
                                    @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" name="nisn" id="nisn"
                                        class="form-control @error('nisn') is-invalid @enderror" required>
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('script')
@endpush
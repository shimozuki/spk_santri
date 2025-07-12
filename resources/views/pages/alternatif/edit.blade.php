@extends('layouts.dashboard')
@section('title', 'Edit Alternatif')
@push('style')
@endpush

@section('main')
<div class="mb-4">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Alternatif</h3>
        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi alternatif.</p>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('alternatif.update', $alternatif) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        value="{{ old('nama_lengkap', $alternatif->nama_lengkap) }}" required>
                                    @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" name="nisn" id="nisn"
                                        class="form-control @error('nisn') is-invalid @enderror"
                                        value="{{ old('nisn', $alternatif->nisn) }}" required>
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" name="nis" id="nis"
                                        class="form-control @error('nis') is-invalid @enderror"
                                        value="{{ old('nis', $alternatif->nis) }}">
                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" id="kelas"
                                        class="form-control @error('kelas') is-invalid @enderror"
                                        value="{{ old('kelas', $alternatif->kelas) }}">
                                    @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" placeholder="Contoh: 2024/2025"
                                        class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                        value="{{ old('tahun_ajaran', $alternatif->tahun_ajaran) }}">
                                    @error('tahun_ajaran')
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
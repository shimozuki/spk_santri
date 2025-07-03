@extends('layouts.dashboard')
@section('title', 'Kriteria')
@push('style')
@endpush
@section('main')
<div class="mb-4">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Kriteria</h3>
        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi kriteria.</p>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kriteria.update', $kriterium) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="code" class="form-label">Code Kriteria</label>
                                    <input type="text" name="code" id="code"
                                        class="form-control @error('code') is-invalid @enderror" required
                                        value="{{ old('code') ?? $kriterium->kode_kriteria }}">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="nama" class="form-label">Nama Kriteria</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" required
                                        value="{{ old('nama', $kriterium->nama ?? '') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="tipe" class="form-label">Tipe Kriteria</label>
                                    <select name="tipe" class="form-control" id="tipe">
                                        <option value="Core Factor"
                                            {{ $kriterium->type == 'Core Factore' ? 'selected' : '' }}>Core Factor
                                        </option>
                                        <option value="Secondary Factor"
                                            {{ $kriterium->type == 'Secondary Factor' ? 'selected' : '' }}>Secondary
                                            Factor
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="nilai" class="form-label">Bobot Nilai</label>
                                    <input type="number" name="bobot" id="bobot"
                                        class="form-control @error('bobot') is-invalid @enderror"
                                        value="{{ old('bobot', $kriterium->bobot ?? '') }}"
                                        step="0.01" min="0" max="10" required>
                                    @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
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
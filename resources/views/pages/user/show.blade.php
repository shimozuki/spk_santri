@extends('layouts.dashboard')
@section('title', 'Alternatif')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Alternatif</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat melihat informasi alternatif.</p>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        value="{{ $alternatif->user->name }}" disabled>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="number" name="npm" id="npm"
                                        class="form-control @error('npm') is-invalid @enderror" required
                                        value="{{ $alternatif->npm }}" disabled>
                                    @error('npm')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="jurursan" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" id="jurursan"
                                        class="form-control @error('jurursan') is-invalid @enderror" required
                                        value="{{ $alternatif->jurusan }}" disabled>
                                    @error('jurursan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-6">
                                    <label for="no_telp" class="form-label">No Telephone</label>
                                    <input type="text" name="no_telp" id="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror" required
                                        value="{{ $alternatif->no_telp }}" disabled>
                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester1" class="form-label">Semester 1</label>
                                    <input type="text" name="semester1" id="semester1"
                                        class="form-control @error('semester1') is-invalid @enderror" required
                                        value="{{ $alternatif->semester1 }}" disabled>
                                    @error('semester1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester2" class="form-label">Semester 2</label>
                                    <input type="text" name="semester2" id="semester2"
                                        class="form-control @error('semester2') is-invalid @enderror" required
                                        value="{{ $alternatif->semester2 }}" disabled>
                                    @error('semester2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester3" class="form-label">Semester 3</label>
                                    <input type="text" name="semester3" id="semester3"
                                        class="form-control @error('semester3') is-invalid @enderror" required
                                        value="{{ $alternatif->semester3 }}" disabled>
                                    @error('semester3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester4" class="form-label">Semester 4</label>
                                    <input type="text" name="semester4" id="semester4"
                                        class="form-control @error('semester4') is-invalid @enderror" required
                                        value="{{ $alternatif->semester4 }}" disabled>
                                    @error('semester4')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester5" class="form-label">Semester 5</label>
                                    <input type="text" name="semester5" id="semester4"
                                        class="form-control @error('semester5') is-invalid @enderror" required
                                        value="{{ $alternatif->semester5 }}" disabled>
                                    @error('semester5')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-lg-2">
                                    <label for="semester6" class="form-label">Semester 6</label>
                                    <input type="text" name="semester6" id="semester4"
                                        class="form-control @error('semester6') is-invalid @enderror" required
                                        value="{{ $alternatif->semester6 }}" disabled>
                                    @error('semester6')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="pas_foto" class="form-label">Pas Foto</label>
                                    <br>
                                    <img id="image-preview1"
                                        src="{{ $alternatif->pas_foto ? asset('file/img/foto/' . $alternatif->pas_foto) : asset('assets/img/user.png') }}"
                                        alt="Preview" class="img-fluid mb-3" style="height: 220px;">
                                    {{-- <input type="file" name="pas_foto" id="pas_foto"
                                        class="form-control-file @error('pas_foto') is-invalid @enderror">
                                    @error('pas_foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>

                                <div class="form-group col-12 col-lg-4">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <br>

                                    <img id="image-preview1"
                                        src="{{ $alternatif->foto_ktp ? asset('file/img/ktp/' . $alternatif->foto_ktp) : asset('assets/img/user.png') }}"
                                        alt="Preview" class="img-fluid mb-3" style="height: 220px;">
                                    {{-- <input type="file" name="foto_ktp" id="foto_ktp"
                                        class="form-control-file @error('foto_ktp') is-invalid @enderror">
                                    @error('foto_ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>

                                <div class="form-group col-12 col-lg-4">
                                    <label for="karya_tulis" class="form-label">Karya Tulis</label>
                                    <br>
                                    @if ($alternatif->karya_tulis)
                                        <a href="{{ asset('file/karya/' . $alternatif->karya_tulis) }}"
                                            target="_blank">Download</a>
                                    @else
                                        <p>Belum upload</p>
                                    @endif

                                    {{-- <input type="file" name="karya_tulis" id="karya_tulis"
                                        class="form-control-file @error('karya_tulis') is-invalid @enderror">
                                    @error('karya_tulis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-lg-12">
                                    <label for="prestasi" class="form-label">Prestasi</label>
                                    <textarea class="form-control @error('prestasi') is-invalid @enderror" id="prestasi" name="prestasi" disabled>
                                            {{ trim($alternatif->prestasi) }}</textarea>
                                    @error('prestasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
@endpush

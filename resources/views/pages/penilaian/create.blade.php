@extends('layouts.dashboard')
@section('title', 'Penilaian')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Penialaian Alternatif | {{ $alternatif->user->name }}</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat menambah informasi
                {{ $alternatif->user->name }}.</p>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('penilaian.store', $alternatif->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="alternatif_id" class="form-control"
                                        value="{{ $alternatif->id }}">
                                    <input type="hidden" name="alternatif_name" class="form-control"
                                        value="{{ $alternatif->user->name }}">
                                    @foreach ($kriterias as $kriteria)
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="name" class="form-label">{{ $kriteria->nama }}
                                                ({{ $kriteria->kode_kriteria }})</label>
                                            <input type="hidden" name="kriteria_id[]" class="form-control"
                                                value="{{ $kriteria->id }}">
                                            <select name="nilai[]" class="form-control" required>
                                                @foreach ($kriteria->subkriteria as $subkriteria)
                                                    <option value="{{ $subkriteria->id }}">
                                                        {{ $subkriteria->nama }} ({{ $subkriteria->nilai }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
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

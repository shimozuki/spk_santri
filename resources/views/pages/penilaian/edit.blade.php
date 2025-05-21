@php
    use App\Models\Penilaian;
    use App\Models\SubKriteria;
@endphp
@extends('layouts.dashboard')
@section('title', 'Penilaian')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Penialaian Alternatif | {{ $alternatif->user->name }}</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi
                {{ $alternatif->user->name }}.</p>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('penilaian.update', $alternatif) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="alternatif_id" class="form-control"
                                        value="{{ $alternatif->id }}">
                                    <input type="hidden" name="alternatif_name" class="form-control"
                                        value="{{ $alternatif->user->name }}">

                                    @foreach ($kriterias as $kriteria)
                                        @php
                                            $alternatifId = $alternatif->id;
                                            $penilaian = Penilaian::where('alternatif_id', $alternatifId)
                                                ->where('kriteria_id', $kriteria->id)
                                                ->first();
                                        @endphp

                                        <div class="form-group col-12 col-lg-6">
                                            <label for="name" class="form-label">{{ $kriteria->nama }}
                                                ({{ $kriteria->kode_kriteria }})</label>

                                            @if ($penilaian && !is_null($penilaian->nilai))
                                                <h6 class="font-weight-light" style="font-size: 12px">
                                                    Dinilai Oleh :
                                                    {{ $penilaian->user->name }}</h6>
                                            @endif

                                            <input type="hidden" name="kriteria_id[]" class="form-control"
                                                value="{{ $kriteria->id }}">
                                            <select name="nilai[]" class="form-control" required>
                                                @foreach ($kriteria->subkriteria as $subkriteria)
                                                    {{-- <option value="{{ $subkriteria->id }}">
                                                        {{ $subkriteria->nama }} ({{ $subkriteria->nilai }})
                                                    </option> --}}

                                                    @if ($penilaian && !is_null($penilaian->nilai))
                                                        <option value="{{ $subkriteria->id }}"
                                                            {{ $subkriteria->id == $penilaian->subkriteria_id ? 'selected' : '' }}>
                                                            {{ $subkriteria->nama }} ({{ $subkriteria->nilai }})
                                                        </option>
                                                    @endif
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

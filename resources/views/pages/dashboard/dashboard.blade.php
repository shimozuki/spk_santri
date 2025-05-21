@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="mb-4">

        <div class="row">
            @if (Auth::user()->role != 'User')
                <div class="container d-flex justify-content-center align-self-center p-5">
                    <h3 class="font-weight-bold text-center">Selamat Datang {{ Auth::user()->name }} Di Aplikasi PILMAPRES
                        IIB Darmajaya
                        Menggunakan
                        Metode Profile Matching & Bubble Sort
                    </h3>
                </div>
            @else
                <div class="container d-flex justify-content-center align-self-center p-5">
                    <h4 class="font-weight-bold text-center">Selamat Datang {{ Auth::user()->name }} Di Aplikasi PILMAPRES
                        IIB Darmajaya
                        <br>
                        @if (empty(Auth::user()->alternatif->semester1))
                            Harap Segera lengkapi persyaratan di halaman <a href="{{ route('profile.index') }}">profile</a>
                        @else
                            Untuk informasi lebih lanjut silahkan kunjungi instagram <a href="">KMH Darmajaya</a>
                        @endif
                    </h4>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('script')
@endpush

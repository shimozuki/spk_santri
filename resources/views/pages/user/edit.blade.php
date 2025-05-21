@extends('layouts.dashboard')
@section('title', 'User')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Userr</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi User.</p>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" disabled
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="form-label">Role</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="Admin"
                                                    class="selectgroup-input" {{ $user->role == 'Admin' ? 'checked' : '' }}
                                                    checked>
                                                <span class="selectgroup-button">Admin</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="Kmh"
                                                    class="selectgroup-input" {{ $user->role == 'Kmh' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Kmh</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="Juri"
                                                    class="selectgroup-input" {{ $user->role == 'Juri' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Juri</span>
                                            </label>
                                        </div>
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

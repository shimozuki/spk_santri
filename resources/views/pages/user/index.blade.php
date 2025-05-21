@extends('layouts.dashboard')
@section('title', 'User')
@push('style')
@endpush
@section('main')
    <div class="mb-4">
        <div class="col-12 order-md-1 order-last">
            <h3>User</h3>
            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi user.</p>
            @include('layouts.alert')
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('users.create') }}">
                            <button class="btn btn-primary">Tambah User</button>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-lg" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 3%">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn btn-sm btn-icon btn-success m-1"><i
                                                        class="fas fa-pen"></i></a>
                                                <form action="{{ route('users.destroy', $user) }}" method="post">
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

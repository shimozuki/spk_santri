<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>SPK Pemilihan Mahasiswa Berprestasi</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    </head>

    <body class="bg-gradient-primary">
        @include('sweetalert::alert')



        <div class="container d-flex justify-content-center">
            <div class="row align-self-center">


                <div class="col-12 mx-auto">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body py-4 px-4">
                            <div class="mb-4">
                                <h1 class="h3 tex-black font-weight-bold">Daftar</h1>
                                <p>Mohon isi data berikut dengan benar.</p>
                            </div>
                            <form class="user" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama Lengkap" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="number" name="npm"
                                            class="form-control @error('npm') is-invalid @enderror" placeholder="NPM"
                                            required>
                                        @error('npm')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <input type="number" name="no_telp"
                                            class="form-control @error('no_telp') is-invalid @enderror"
                                            placeholder="No Telephone" required>
                                        @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="text" name="jurusan"
                                            class="form-control @error('jurusan') is-invalid @enderror"
                                            placeholder="Jurusan" required>
                                        @error('jurusan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <button name="submit" type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                    Daftar</button>
                                <div class="text-center mt-3">
                                    <p class="fs-6 fw-light">Sudah punya akun ?
                                        <a href="{{ route('login') }}"
                                            class="fw-light text-decoration-none text-color">Masuk</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>
    </body>

</html>

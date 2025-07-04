<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SPK Perengkingan Santri</title>

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
                            <h1 class="h3 tex-black font-weight-bold">Lupa Password</h1>
                            <p>Mohon isi dengan email yang terdaftar.</p>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                        <form class="user" action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input required type="email"
                                    class="form-control @error('email') is-invalid
                                        @enderror"
                                    placeholder="mail@mail.com" name="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <button name="submit" type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                Kirim Email Reset Password</button>

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
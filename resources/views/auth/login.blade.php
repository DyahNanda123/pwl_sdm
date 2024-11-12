<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pengguna</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
        /* Tambahkan style untuk logo */
        
        .login-logo {
            margin-top: 20px; /* Menambahkan jarak di atas logo */
            margin-bottom: 1px;
        }

        .login-logo img {
            width: 200px; /* Sesuaikan ukuran logo */
            height: auto;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- Logo -->
        <div class="card card-outline card-primary">
            <div class="login-logo">
                <img src="{{ asset('image/polinemabg.png') }}" alt="Logo"> <!-- Ganti path/to/logo.png dengan lokasi logo -->
            </div>
            <div class="card-header text-center"><a href="#" class="h1"><b>SIMTI</b></a></div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="#" method="POST" id="form-login">
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember"><label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                    <div class="row">
                        Don't have account? <a href="#">register</a>
                    </div>
                </form>
            </div>
            <footer class="text-center mt-3">
                <small>2024 &copy; Sistem Informasi Manajemen SDM TI<small>
            </footer>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    }
                },
                submitHandler: function(form) {
                    // Simulasi login sukses atau gagal tanpa terhubung ke backend
                    const username = $('#username').val();
                    const password = $('#password').val();
                    
                    // Tentukan kredensial statis untuk login
                    const correctUsername = 'admin';
                    const correctPassword = 'abc123';

                    if (username === correctUsername && password === correctPassword) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Login Berhasil',
                        }).then(function() {
                            window.location = response.redirect; // Redirect ke halaman utama atau home
                        });
                    } else {
                        $('#error-username').text('');
                        $('#error-password').text('');
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: 'Username atau password salah'
                        });
                    }
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <!-- Google Font: Source Sans Pro -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">-->
    <!-- icheck bootstrap -->
    <!--<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">-->
    <!-- Theme style -->
    <!--<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('dist/css/registerku.css') }}">
</head>

<body>
    <div class="box">
        {{-- Alert --}}
        @if (session("text"))
            <script>alert("{{ session('text') }}");</script>
        @endif
        {{-- End Alert --}}
        <form action="{{ route("signup") }}" method="post">
            @csrf
            <div class="form">
                <h2>Register a new account</h2>
                <div class="inputbox">
                    <input type="name" name="name" required="required" autocomplete="chrome-off" class="form-control @error("name") is-invalid @enderror">
                    <span>Full Name</span>
                    <i></i>
                    @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="inputbox">
                    <input type="email" name="email" required="required" autocomplete="chrome-off" class="form-control @error("email") is-invalid @enderror">
                    <span>Email@example.com</span>
                    <i></i>
                    @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="inputbox">
                    <input type="Password" required="required" name="password" autocomplete="chrome-off" class="form-control @error("password") is-invalid @enderror">
                    <span>Password</span>
                    <i></i>
                    @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="links">
                    <a href="#">Lupa Password</a>
                    <a href="{{ url("auth/login") }}">Sudah Punya akun? Login disini</a>
                </div>
                <input type="submit" value="Daftar">
            </div>
        </form>
    </div>
 <!--jQuery -->
<!--<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>-->
 <!--Bootstrap 4 -->
<!--<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>-->
 <!--AdminLTE App -->
<!--<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>-->
</body>
</html>
</body>

</html>
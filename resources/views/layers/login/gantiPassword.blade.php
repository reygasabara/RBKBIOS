<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RBKBIOS | LOGIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        .form-signin {
            max-width: 80%;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .account-wall {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .login-title {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }

        body {
            background-color: #9aebff
        }
    </style>
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-8 col-md-offset-2">
                <h1 class="login-title bold text-blue text-center" style="font-size: 40px;"><b>RBK</b>BIOS</h1>
                <div class="account-wall">
                    <p class="text-primary text-center"><span class="material-symbols-outlined"
                            style="font-size:120px;">
                            passkey
                        </span></p>

                    <form class="form-signin" action="/ganti-password" method="POST">
                        @if (session()->has('changePasswordError'))
                            <h6><strong class="text-danger">{{ session('changePasswordError') }}</strong></h6>
                        @endif

                        @if ($errors->any())
                            <h6><strong class="text-danger">Password baru harus terdiri dari kombinasi huruf dan
                                    angka</strong></h6>
                        @endif

                        @csrf

                        <div class="form-group">
                            <label for="lama">Password Lama</label>
                            <input type="password" class="form-control" value="{{ old('lama') }}" id="lama"
                                name="lama" placeholder="Masukkan password Anda" autofocus required>
                        </div>

                        <div class="form-group">
                            <label for="baru">Password Baru</label>
                            <input type="password" class="form-control" value="{{ old('baru') }}" id="baru"
                                name="baru" minlength="6" placeholder="Masukkan password Anda" required>
                        </div>

                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" value="{{ old('konfirmasi') }}" id="konfirmasi"
                                name="konfirmasi" minlength="6" placeholder="Masukkan password Anda" required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-md btn-primary" type="submit">
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

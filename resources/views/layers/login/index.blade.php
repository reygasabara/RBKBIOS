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
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
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
            background-color: #3c8dbc
        }
    </style>
</head>

<body class="" style="display: flex; height: 100vh;">
    <div class="container" style="margin:auto;">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <h1 class="login-title bold text-blue text-center" style="font-size: 40px;"><b>RBK</b>BIOS
                    </h1>
                    <p class="text-primary text-center"><img src="{{ asset('img/user-with-border.png') }}"
                            class="img-circle" alt="User Image" style="width: 100px">

                    <form class="form-signin" action="/login" method="POST">
                        @if (session()->has('loginError'))
                            <h6><strong class="text-danger">{{ session('loginError') }}</strong></h6>
                        @endif

                        @if (session()->has('success'))
                            <h6><strong class="text-success">{{ session('success') }}</strong></h6>
                        @endif

                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" value="{{ old('username') }}" id="username"
                                name="username" placeholder="Masukkan username Anda" autofocus required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="{{ old('password') }}" id="password"
                                name="password" placeholder="Masukkan password Anda" required>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

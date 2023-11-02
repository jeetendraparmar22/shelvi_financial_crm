<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Shelvi Finance | Login</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-0" src="{{ asset('assets/img/logo.svg') }}" alt="Logo" />
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to dashboard</p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" name="mobile_no"
                                        class="form-control @error('mobile_no') is-invalid
                                        
                                    @enderror"
                                        id="" placeholder="Enter Mobile no"value="{{ old('mobile_no') }}">
                                    <label for="floatingInput">Mobile No</label>
                                </div>
                                @error('mobile_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-floating">
                                    <input type="password" name="password"
                                        class="form-control pass-input @error('password') is-invalid
                                        
                                    @enderror"
                                        id="floatingPassword" placeholder="Password">
                                    <span class="fas fa-eye toggle-password"></span>
                                    <label for="floatingPassword">Password</label>
                                </div>

                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cb1" />
                                                <label class="custom-control-label" for="cb1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-lg btn-block btn-primary btn_login" type="submit">
                                        Login
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

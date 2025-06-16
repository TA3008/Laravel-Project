<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Enlink Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('assets/images/others/login-3.png') }}')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="logo" src="{{ asset('assets/images/logo/logo.png') }}">
                                        <h2 class="m-b-0">Register</h2>
                                    </div>
                                    <form action="{{ route('register.post') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="name">Name:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-mail"></i>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password_confirmation">Confirm Password:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Already have an account? 
                                                    <a class="small" href="{{ route('login') }}"> Sign in</a>
                                                </span>
                                                <button class="btn btn-primary">Sign Up</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2024 Your Company</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="School Management System">
    <meta name="author" content="vdoo.biz">
    <meta name="keyword" content="Student Management System">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>User Login</title>

    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
<div class="container">
        <div class="col-md-8" style="width: 70%;margin:0 auto">
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-block">
                        <form  role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                            <input type="email" id="email" name="email" autofocus required value="{{ old('email') }}" class="form-control" placeholder="Email">

                        </div>
                        <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                        <div class="row">
                            <p class="text-danger" style="margin-top: 9px">{{ $errors->first('email') }}</p>
                        </div>
                        @endif
                        </form>
                    </div>
                </div>
                <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-block text-center">
                        <div>
                            <h2>Bill-Trade</h2>
                            <p>
                                Website Administration for Bill-Trade!
                            </p>
                            <button type="button" class="btn btn-primary active mt-3">017 837 754, hengvongkol@gmail.com</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>

</html>


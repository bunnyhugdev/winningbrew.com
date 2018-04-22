<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <title>WinningBrew.com - Is your brew good enough?</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300|Source+Sans+Pro:400,700,400italic' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

</head>
<body id="app-layout">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/winningbrew_logo.png" height="60" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="app-navbar-collapse">
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <form class="form-inline" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <input name="email" value="{{ old('email') }}" class="form-control mr-sm-2" type="email" placeholder="Email" aria-label="Email">
                            <input name="password" class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Login</button>
                        </form>
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="account-dropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu" role="menu" aria-labelledby="account-dropdown">
                                <a class="dropdown-item" href="{{ url('/profile') . '/' . Auth::user()->id }}"><i class="fa fa-btn fa-pencil-square-o"></i> Profile</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>

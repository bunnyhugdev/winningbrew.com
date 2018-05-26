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
<body id="app-layout" class="nonav">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/winningbrew_logo.png" height="60" alt="">
            </a>
        </nav>

        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>

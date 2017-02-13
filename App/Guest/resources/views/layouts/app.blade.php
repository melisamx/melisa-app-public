<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/vendor/fontawesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="/guest/css/style.css?v=1.0.0" rel="stylesheet">
    <link href="/guest/css/app.css?v=1.1.1" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @if (Auth::guest())
    <header>
        <div class="container">
            <div class="row">
                <div class="col s12 push-m2 m8 push-l4 l4 center-align">
                    <a href="{{ url('/') }}">
                        <img class="responsive-img powerby-image" src="/assets/images/powerby.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>
    @endif
    <main>
    @yield('content')
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 push-m2 m8 center-align">
                    
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="vendor/jquery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="vendor/materialize/0.97.7/js/materialize.min.js"></script>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('footer')
</body>
</html>
